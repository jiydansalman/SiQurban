<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Packages;
use App\Models\Saving;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if not exists
        if (!User::where('role_id', 1)->exists()) {
            User::create([
                'username' => 'admin',
                'email' => 'admin@siqurban.com',
                'password' => Hash::make('admin123'),
                'full_name' => 'Administrator SiQurban',
                'role_id' => 1
            ]);
        }

        // Create sample regular users
        $users = [
            [
                'username' => 'ahmad_fauzi',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Ahmad Fauzi',
                'phone' => '081234567890',
                'address' => 'Jl. Masjid No. 123, Surabaya',
                'role_id' => 2
            ],
            [
                'username' => 'siti_nurhaliza',
                'email' => 'siti@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Siti Nurhaliza',
                'phone' => '081234567891',
                'address' => 'Jl. Pondok Pesantren No. 456, Surabaya',
                'role_id' => 2
            ],
            [
                'username' => 'muhammad_rizki',
                'email' => 'rizki@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Muhammad Rizki',
                'phone' => '081234567892',
                'address' => 'Jl. Islamic Center No. 789, Surabaya',
                'role_id' => 2
            ],
            [
                'username' => 'fatimah_azzahra',
                'email' => 'fatimah@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Fatimah Azzahra',
                'phone' => '081234567893',
                'address' => 'Jl. Dakwah No. 101, Surabaya',
                'role_id' => 2
            ],
        ];

        foreach ($users as $userData) {
            if (!User::where('email', $userData['email'])->exists()) {
                User::create($userData);
            }
        }

        // Create sample packages if not exists
        $packages = [
            [
                'name' => 'Paket Kambing Grade A',
                'type' => 'Kambing',
                'price' => 2500000,
                'description' => 'Kambing berkualitas tinggi dengan berat 25-30kg, sehat dan telah melewati pemeriksaan dokter hewan.',
                'image_path' => 'packages/kambing-a.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Paket Kambing Grade B',
                'type' => 'Kambing',
                'price' => 2000000,
                'description' => 'Kambing berkualitas baik dengan berat 20-25kg, sehat dan siap untuk qurban.',
                'image_path' => 'packages/kambing-b.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Paket Domba Premium',
                'type' => 'Domba',
                'price' => 3000000,
                'description' => 'Domba premium dengan berat 30-35kg, kualitas terbaik untuk ibadah qurban.',
                'image_path' => 'packages/domba-premium.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Paket Domba Standard',
                'type' => 'Domba',
                'price' => 2500000,
                'description' => 'Domba berkualitas baik dengan berat 25-30kg, cocok untuk keluarga.',
                'image_path' => 'packages/domba-standard.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Paket Sapi 1/7',
                'type' => 'Sapi',
                'price' => 2800000,
                'description' => 'Bagian 1/7 dari sapi berkualitas tinggi, berat keseluruhan 400-500kg.',
                'image_path' => 'packages/sapi-17.jpg',
                'is_active' => true
            ],
            [
                'name' => 'Paket Sapi 1/5',
                'type' => 'Sapi',
                'price' => 3500000,
                'description' => 'Bagian 1/5 dari sapi premium, berat keseluruhan 450-550kg.',
                'image_path' => 'packages/sapi-15.jpg',
                'is_active' => true
            ]
        ];

        foreach ($packages as $packageData) {
            if (!Packages::where('name', $packageData['name'])->exists()) {
                Packages::create($packageData);
            }
        }

        // Create sample savings data
        $regularUsers = User::where('role_id', 2)->get();
        $packages = Packages::all();

        if ($regularUsers->count() > 0 && $packages->count() > 0) {
            foreach ($regularUsers as $user) {
                // Random number of savings per user (0-2)
                $savingsCount = rand(0, 2);
                
                for ($i = 0; $i < $savingsCount; $i++) {
                    $package = $packages->random();
                    
                    // Don't create duplicate active savings for same user
                    if (Saving::where('user_id', $user->id)
                              ->where('package_id', $package->id)
                              ->where('status', 'active')
                              ->exists()) {
                        continue;
                    }

                    $targetDate = Carbon::create(2026, 5, 27);
                    $createdAt = Carbon::now()->subDays(rand(1, 60));
                    
                    // Random saving type
                    $savingType = ['weekly', 'monthly'][rand(0, 1)];
                    
                    if ($savingType === 'weekly') {
                        $periodsRemaining = $createdAt->diffInWeeks($targetDate);
                        $amountPerPeriod = $periodsRemaining > 0 ? $package->price / $periodsRemaining : $package->price;
                    } else {
                        $periodsRemaining = $createdAt->diffInMonths($targetDate);
                        $amountPerPeriod = $periodsRemaining > 0 ? $package->price / $periodsRemaining : $package->price;
                    }

                    // Random progress (0-100%)
                    $progressPercentage = rand(10, 95);
                    $completedPeriods = round(($progressPercentage / 100) * $periodsRemaining);
                    $amountSaved = $completedPeriods * $amountPerPeriod;

                    // Random status based on progress
                    $status = 'active';
                    if ($progressPercentage >= 100 || $amountSaved >= $package->price) {
                        $status = 'completed';
                        $amountSaved = $package->price;
                        $completedPeriods = $periodsRemaining;
                    } elseif (rand(1, 20) === 1) { // 5% chance of cancelled
                        $status = 'cancelled';
                    }

                    Saving::create([
                        'user_id' => $user->id,
                        'package_id' => $package->id,
                        'amount_saved' => $amountSaved,
                        'delivery_location' => ['Rumah', 'Masjid'][rand(0, 1)],
                        'delivery_address' => $user->address ?? 'Alamat pengiriman ' . $user->full_name,
                        'saving_type' => $savingType,
                        'amount_per_period' => $amountPerPeriod,
                        'target_date' => $targetDate,
                        'total_periods' => $periodsRemaining,
                        'completed_periods' => $completedPeriods,
                        'status' => $status,
                        'created_at' => $createdAt,
                        'updated_at' => $createdAt->copy()->addDays(rand(0, 30))
                    ]);
                }
            }
        }

        $this->command->info('Dashboard seeder completed successfully!');
        $this->command->info('Admin user: admin@siqurban.com / admin123');
        $this->command->info('Sample users created with various savings data');
    }
}