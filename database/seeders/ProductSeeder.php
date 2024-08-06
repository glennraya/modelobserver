<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fictional product names array
        $productNames = [
            'LaserGym Pro',
            'SolarWave Charger',
            'NanoBot Butler',
            'AquaGlide Hoverboard',
            'MindSync Headset',
            'PlasmaGrill BBQ',
            'QuantumScape VR',
            'EcoSphere Terrarium',
            'TimeWarp Watch',
            'MegaFusion Blender',
            'HyperPulse Speaker',
            'VirtualVista Glasses',
            'SkyFlare Drone',
            'FusionFuel Car',
            'NanoGrow Plant Kit',
            'DataSphere Globe',
            'InfiniteCoaster VR',
            'RoboChef KitchenBot',
            'SolarFlux Power Bank',
            'QuantumLeap Shoes',
            'CyberPulse Earbuds',
            'GalaxyLink Router',
            'BioArmor Suit',
            'MindMeld Helmet',
            'HydroFusion Shower',
            'BioTech Oasis',
            'AeroDash Backpack',
            'XenoCraft Spaceship',
            'TeleportPod Transporter',
            'BrainWave Amplifier',
            'LuxoGlide Chair',
            'MicroFleet Toy Set',
            'FusionCruiser Bike',
            'AeroJet Pack',
            'DreamSphere Pillow',
            'InfinityScreen TV',
            'LunaHike Boots',
            'AquaBot Aquarium',
            'QuantumZoom Camera',
            'MegaPixel Art Kit',
            'SolarFlare Oven',
            'VeloSwift Bicycle',
            'BioGlow Plant Lamp',
            'HyperSpeed Scooter',
            'NeuroPulse Monitor',
            'RoboMate Companion',
            'EcoHarvest Garden',
            'SpaceExplorer VR',
            'HoloChef KitchenBot',
            'DataFusion Globe',
            'AquaView Goggles',
            'NebulaSound System',
            'NanoCharge Cable',
            'MindMerge Headset',
            'FusionGrill BBQ',
            'StellarCraft Model',
            'LaserLink Router',
            'HyperDrive Car',
            'EcoWave Generator',
            'TimeSync Watch',
            'QuantumPod Speaker',
            'GalaxyGlide Hoverboard',
            'BioSphere Terrarium',
            'QuantumBlast Gaming',
            'SolarSprint Sneakers',
            'NanoHaven Home',
            'VirtualWave Glasses',
            'XenoSphere Globe',
            'AeroBlast Drone',
            'FusionTorch Flashlight',
            'CyberSphere VR',
            'RoboGuard Security',
            'MindRide Rollercoaster',
            'PlasmaJet Hovercraft',
            'QuantumChill Fridge',
            'NanoFlame Lighter',
            'BioRide Bike',
            'HydroLux Bathtub',
            'AeroDine Tableware',
            'DataVista Glasses',
            'SolarLink Charger',
            'TimeFlux Clock',
            'MegaFusion Generator',
            'NeuroSync Helmet',
            'EcoScape Terrarium',
            'SpaceCraft Simulator',
            'LunaLuxe Bed',
            'QuantumPulse Earbuds',
            'HyperHarbor Yacht',
            'RoboWave Surfboard',
            'MindSculptor Pen',
            'AquaZen Fountain',
            'NanoTrek Hiking Gear',
            'StellarSync Telescope',
            'SolarMatrix Panel',
            'BioFusion Lab',
            'QuantumShift Shoes',
            'LaserPulse Laser',
            'TeleportWave Gateway',
            'InfinityPulse Speaker',
            'DreamVoyage Cruise',
            'EcoHaven Cabin',
            'DataSphere Atlas',
            'HydroGlide Surfboard',
            'HyperView Glasses',
            'RoboTrek Backpack',
            'MindMeld Music Player',
            'AeroDroid Drone',
            'SolarBlast BBQ',
            'BioHarbor Marina',
        ];

        foreach ($productNames as $name) {
            $newName = $this->generateUniqueName($productNames);
            $productNames[] = $newName;

            Product::create([
                'id' => Str::uuid(),
                'name' => $newName,
                'price' => fake()->randomFloat(2, 50, 1300),
                'description' => fake()->paragraph(),
                'expiry_date' => fake()->dateTime(),
            ]);
        }
    }

    // Generate a 'unique' fictional product name
    private function generateUniqueName(&$existingNames)
    {
        $newName = $this->generateRandomName();

        // Add this to track the number of attempts to generate a unique name
        $attempts = 0;

        while (in_array($newName, $existingNames)) {
            $newName = $this->generateRandomName();

            // Increment the attempts count
            $attempts++;

            // Break the loop if attempts exceed a limit
            if ($attempts > 500) {
                break;
            }
        }

        return $newName;
    }

    // Generate random fictional product names from the provided arrays.
    private function generateRandomName()
    {
        $adjectives = [
            'Super', 'Ultra', 'Mega', 'Fantastic', 'Incredible',
            'Awesome', 'Amazing', 'Wonderful', 'Spectacular', 'Marvelous',
            'Brilliant', 'Exceptional', 'Extraordinary', 'Majestic', 'Splendid',
            'Stupendous', 'Unbelievable', 'Outstanding', 'Remarkable', 'Exquisite',
        ];

        $nouns = [
            'Widget', 'Gizmo', 'Contraption', 'Device', 'Tool',
            'Appliance', 'Machine', 'Apparatus', 'Instrument', 'Artifact',
            'Engine', 'Mechanism', 'Gadget', 'Implement', 'Utensil',
            'Object', 'Thingamajig', 'Doozy', 'Whatsit', 'Doodad',
        ];

        $adjective = $adjectives[array_rand($adjectives)];
        $noun = $nouns[array_rand($nouns)];

        return $adjective.' '.$noun;
    }
}
