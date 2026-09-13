<?php

namespace Database\Seeders;

use App\Models\{Notification, PortfolioCategory, PortfolioItem, PortfolioMedia, Provider, ProviderCategory, ProviderMedia, Request as LeadRequest, RequestAssignment, Role, Service, ServiceCategory, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoContentSeeder extends Seeder
{
    public function run(): void
    {
        $registered = Role::firstOrCreate(['name' => 'REGISTERED_USER']);
        $providerRole = Role::firstOrCreate(['name' => 'PROVIDER']);
        $adminRole = Role::firstOrCreate(['name' => 'ADMIN']);
        $admin = User::where('phone', '+201000000002')->first() ?: User::updateOrCreate(['phone' => '+201000000002'], ['name' => 'Demo Admin', 'email' => 'admin@blackhorse.test', 'password_hash' => Hash::make('Password1'), 'status' => 'ACTIVE']);
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        $customers = [];
        foreach ([['Laila Hassan', 'laila.hassan@blackhorse.test'], ['Omar Nassar', 'omar.nassar@blackhorse.test'], ['Mariam Adel', 'mariam.adel@blackhorse.test'], ['Youssef Karim', 'youssef.karim@blackhorse.test'], ['Nour El Din', 'nour.eldin@blackhorse.test']] as $i => [$name, $email]) {
            $user = User::updateOrCreate(['phone' => '+2010000001'.str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT)], ['name' => $name, 'email' => $email, 'password_hash' => Hash::make('Password1'), 'status' => 'ACTIVE']);
            $user->roles()->syncWithoutDetaching([$registered->id]);
            $customers[] = $user;
        }

        $providerData = [
            ['Salma Ibrahim', 'Trainer', 12, 'Cairo', 'salma.ibrahim@blackhorse.test', 'Dressage coach focused on calm, confident partnerships and sustainable performance.'],
            ['Hany Saad', 'Trainer', 18, 'Giza', 'hany.saad@blackhorse.test', 'Show-jumping trainer helping riders develop precision, rhythm, and competition readiness.'],
            ['Dr. Reem Fathy', 'Veterinarian', 14, 'Cairo', 'reem.fathy@blackhorse.test', 'Equine veterinarian specialising in preventative care, diagnostics, and performance horse health.'],
            ['Dr. Karim Wael', 'Veterinarian', 9, 'Alexandria', 'karim.wael@blackhorse.test', 'Compassionate field veterinarian providing trusted routine and urgent equine care.'],
            ['Mina George', 'Consultant', 16, 'Cairo', 'mina.george@blackhorse.test', 'Equestrian operations consultant supporting owners with planning, programs, and stable growth.'],
            ['Dina Mostafa', 'Consultant', 11, 'New Cairo', 'dina.mostafa@blackhorse.test', 'Specialist in horse-and-rider development, training plans, and private client advisory.'],
            ['Ashraf Tarek', 'Stable Worker', 13, 'Giza', 'ashraf.tarek@blackhorse.test', 'Stable care professional known for meticulous routines, nutrition, and horse wellbeing.'],
            ['Heba Samir', 'Stable Worker', 8, 'Cairo', 'heba.samir@blackhorse.test', 'Experienced groom delivering dependable daily care for private and competition yards.'],
            ['Walid Essam', 'Trainer', 21, 'Ismailia', 'walid.essam@blackhorse.test', 'Veteran trainer with a record of preparing horses for regional competition and recovery.'],
        ];
        $providers = [];
        foreach ($providerData as $i => [$name, $categoryName, $years, $location, $email, $bio]) {
            $phone = '+201000002'.str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            $user = User::updateOrCreate(['phone' => $phone], ['name' => $name, 'email' => $email, 'password_hash' => Hash::make('Password1'), 'status' => 'ACTIVE']);
            $user->roles()->syncWithoutDetaching([$registered->id, $providerRole->id]);
            $category = ProviderCategory::firstOrCreate(['name' => $categoryName], ['status' => 'ACTIVE']);
            $provider = Provider::updateOrCreate(['user_id' => $user->id], ['category_id' => $category->id, 'bio' => $bio, 'experience_years' => $years, 'location' => $location, 'verification_status' => 'VERIFIED', 'approved_at' => now()->subDays(30 - $i)]);
            $providers[] = $provider;
            ProviderMedia::firstOrCreate(['provider_id' => $provider->id, 'file_url' => "https://images.unsplash.com/photo-1551884831-bbf3cdc6469e?auto=format&fit=crop&w=900&q=80"], ['type' => 'IMAGE', 'title' => 'Professional profile media']);
        }

        $portfolioData = [
            ['Training Success', 'From uncertainty to confident partnership', 'A structured twelve-week training program built trust, balance, and consistency for a promising young horse.'],
            ['Rehabilitation Cases', 'A measured return to movement', 'A careful rehabilitation plan supported a safe, progressive return to work after a difficult recovery.'],
            ['Consulting', 'Designing a private equestrian program', 'Black Horse advisory shaped a complete training and care program around the owner’s goals.'],
            ['Veterinary Care', 'Prevention as performance', 'A preventative care program helped a competition horse stay healthy, comfortable, and ready.'],
            ['Stable Management', 'Raising the standard of daily care', 'A stable review introduced clearer routines, documentation, and wellbeing-led operations.'],
            ['Competition Achievements', 'Prepared for the big arena', 'Focused preparation and rider coaching delivered a composed, confident competition performance.'],
        ];
        $portfolioItems = [];
        foreach ($portfolioData as $i => [$categoryName, $title, $description]) {
            $category = PortfolioCategory::firstOrCreate(['name' => $categoryName], ['status' => 'ACTIVE', 'sort_order' => $i]);
            $item = PortfolioItem::updateOrCreate(['title' => $title], ['category_id' => $category->id, 'short_description' => $description, 'description' => $description, 'status' => 'ACTIVE', 'created_by' => $admin->id]);
            PortfolioMedia::firstOrCreate(['portfolio_id' => $item->id, 'file_url' => "https://images.unsplash.com/photo-1553284965-83fd3e82fa5a?auto=format&fit=crop&w=1200&q=80"], ['type' => 'IMAGE', 'title' => 'Success story gallery', 'sort_order' => 0]);
            $portfolioItems[] = $item;
        }

        $service = Service::where('title', 'Horse Training')->first();
        foreach ([['NEW', 0, 'I am looking for a tailored training plan for my young horse.'], ['IN_PROGRESS', 1, 'Please advise on a rehabilitation program following a period of rest.'], ['COMPLETED', 2, 'I would like guidance on improving our competition preparation.']] as [$status, $customerIndex, $message]) {
            $request = LeadRequest::firstOrCreate(['phone' => $customers[$customerIndex]->phone, 'message' => $message], ['user_id' => $customers[$customerIndex]->id, 'service_id' => $service?->id, 'name' => $customers[$customerIndex]->name, 'email' => $customers[$customerIndex]->email, 'status' => $status]);
            if ($status !== 'NEW') RequestAssignment::firstOrCreate(['request_id' => $request->id], ['admin_id' => $admin->id, 'assigned_at' => now()->subDays(2), 'status' => 'ASSIGNED', 'notes' => 'Demo follow-up assignment']);
            Notification::firstOrCreate(['user_id' => $customers[$customerIndex]->id, 'type' => 'REQUEST_STATUS_CHANGED', 'message' => "Your request status is {$status}."], ['title' => 'Request update', 'data' => ['request_id' => $request->id]]);
        }
        Notification::firstOrCreate(['user_id' => $providers[0]->user_id, 'type' => 'PROVIDER_APPLICATION_APPROVED', 'message' => 'Your provider profile is verified and visible.'], ['title' => 'Provider profile verified']);
    }
}
