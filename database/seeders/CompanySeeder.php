<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'A3D',
            'legal_form' => 'SRL',
            'vat_number' => '0794136228',
            'vat_country_code' => 'BE',
            'street' => 'Chemin du Cyclotron',
            'number' => '6',
            'box' => null,
            'city' => 'Ottignies-Louvain-la-Neuve',
            'zipcode' => '1348',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'BELGIAN DREAM',
            'legal_form' => 'SRL',
            'vat_number' => '0751787909',
            'vat_country_code' => 'BE',
            'street' => 'Chaussée Brunehault',
            'number' => '236',
            'box' => null,
            'city' => 'Binche',
            'zipcode' => '7134',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'BOTALYS',
            'legal_form' => 'SA',
            'vat_number' => '0834134177',
            'vat_country_code' => 'BE',
            'street' => 'Avenue des Artisans',
            'number' => '8',
            'box' => '6',
            'city' => 'Ghislenghien',
            'zipcode' => '7822',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => "BUREAU D'ASSURANCES MICHEL DEBUCQUOY - HYPO CREDIT",
            'legal_form' => 'SPRL',
            'vat_number' => '0882895384',
            'vat_country_code' => 'BE',
            'street' => 'Rue du Rucquoy',
            'number' => '2',
            'box' => '1',
            'city' => 'Mouscron',
            'zipcode' => '7700',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'CLICQCONSULT',
            'legal_form' => 'SRL',
            'vat_number' => '0544664797',
            'vat_country_code' => 'BE',
            'street' => 'Avenue de maire',
            'number' => '12',
            'box' => null,
            'city' => 'Tournai',
            'zipcode' => '7500',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'DEALVIEW',
            'legal_form' => 'SRL',
            'vat_number' => '0792881463',
            'vat_country_code' => 'BE',
            'street' => 'Chemin de Wiers',
            'number' => '25',
            'box' => null,
            'city' => 'Péruwelz',
            'zipcode' => '7600',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'FORMYFIT',
            'legal_form' => 'SRL',
            'vat_number' => '0599922630',
            'vat_country_code' => 'BE',
            'street' => "Chemin d'Hollaye",
            'number' => '5',
            'box' => null,
            'city' => 'Mont-de-l’Enclus',
            'zipcode' => '7750',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'INNOVATIVE SOLUTIONS',
            'legal_form' => 'SRL',
            'vat_number' => '0740541748',
            'vat_country_code' => 'BE',
            'street' => 'Rue des Ateliers',
            'number' => '7',
            'box' => '9',
            'city' => 'Molenbeek-Saint-Jean',
            'zipcode' => '1080',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'LEMAIRE STEEVE',
            'legal_form' => 'Indépendant',
            'vat_number' => '0636898733',
            'vat_country_code' => 'BE',
            'street' => 'Rue du paradis',
            'number' => '27',
            'box' => null,
            'city' => 'Lesdain',
            'zipcode' => '7321',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'MDNVERSE',
            'legal_form' => 'SRL',
            'vat_number' => '0788813601',
            'vat_country_code' => 'BE',
            'street' => 'Avenue Louise',
            'number' => '54',
            'box' => null,
            'city' => 'Ixelles',
            'zipcode' => '1050',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'MEDIAKOD',
            'legal_form' => 'SPRL',
            'vat_number' => '0846151685',
            'vat_country_code' => 'BE',
            'street' => 'Résidence Grande Barre',
            'number' => '22',
            'box' => '3',
            'city' => 'Tournai',
            'zipcode' => '7522',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'REDSYSTEM',
            'legal_form' => 'SRL',
            'vat_number' => '0752709508',
            'vat_country_code' => 'BE',
            'street' => 'Avenue de maire',
            'number' => '12',
            'box' => null,
            'city' => 'Tournai',
            'zipcode' => '7500',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'SEKIMI DIMITRI',
            'legal_form' => 'Indépendant',
            'vat_number' => '45798412540',
            'vat_country_code' => 'FR',
            'street' => 'Rue Saint-Prix Barou',
            'number' => '14',
            'box' => null,
            'city' => 'Annonay',
            'zipcode' => '07100',
            'country' => 'France',
        ]);

        Company::create([
            'name' => 'ZEBATUCA',
            'legal_form' => 'ASBL',
            'vat_number' => '0682930280',
            'vat_country_code' => 'BE',
            'street' => 'Rue des Déportés',
            'number' => '37',
            'box' => 'A',
            'city' => 'Antoing',
            'zipcode' => '7641',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'WE-LINK',
            'legal_form' => 'SRL',
            'vat_number' => '755737490',
            'vat_country_code' => 'BE',
            'street' => 'Rue Pierre ',
            'number' => '86',
            'box' => null,
            'city' => 'Tournai',
            'zipcode' => '7540',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'ORANGE BLEU',
            'legal_form' => 'SRL',
            'vat_number' => '0445864359 ',
            'vat_country_code' => 'BE',
            'street' => 'Rue du Mouligneau',
            'number' => '71',
            'box' => null,
            'city' => 'Mons',
            'zipcode' => '7011',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'VEIGA MANAGEMENT',
            'legal_form' => 'SAS',
            'vat_number' => '71948227335',
            'vat_country_code' => 'FR',
            'street' => 'Rue de la raude',
            'number' => '14',
            'box' => null,
            'city' => 'Tassin-la-Demi-Lune',
            'zipcode' => '69160',
            'country' => 'France',
        ]);

        Company::create([
            'name' => 'PRISMVIDEO',
            'legal_form' => 'SNC',
            'vat_number' => '0716681728',
            'vat_country_code' => 'BE',
            'street' => 'Rue du Progres',
            'number' => '13',
            'box' => null,
            'city' => 'Tournai',
            'zipcode' => '7500',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'Hello UGO',
            'legal_form' => 'SRL',
            'vat_number' => '0768368573',
            'vat_country_code' => 'BE',
            'street' => 'Avenue de Maire',
            'number' => '44',
            'box' => null,
            'city' => 'Tournai',
            'zipcode' => '7500',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'BLUE IN GREEN PRODUCTIONS',
            'legal_form' => 'SA',
            'vat_number' => '0455819529',
            'vat_country_code' => 'BE',
            'street' => 'Boulevard Lalaing',
            'number' => '30',
            'box' => null,
            'city' => 'Tournai',
            'zipcode' => '7500',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'FRANCK DEBUE AVOCAT',
            'legal_form' => 'SPRL',
            'vat_number' => '699507283',
            'vat_country_code' => 'BE',
            'street' => 'Rue aux laines',
            'number' => '70',
            'box' => null,
            'city' => 'Bruxelles',
            'zipcode' => '1000',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'INGELEC',
            'legal_form' => 'SRL',
            'vat_number' => '0897792408',
            'vat_country_code' => 'BE',
            'street' => 'Drève Gustave Fache',
            'number' => '17',
            'box' => null,
            'city' => 'Mouscron',
            'zipcode' => '7700',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'CONNEXION.',
            'legal_form' => 'SRL',
            'vat_number' => '0793736944',
            'vat_country_code' => 'BE',
            'street' => 'Chaussée de Lille',
            'number' => '479',
            'box' => '2',
            'city' => 'Tournai',
            'zipcode' => '7501',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'UTILE GAMES',
            'legal_form' => 'SRL',
            'vat_number' => '0750931042',
            'vat_country_code' => 'BE',
            'street' => 'VIEUX CHEMIN',
            'number' => '11',
            'box' => 'A',
            'city' => 'BRUXELLES',
            'zipcode' => '1180',
            'country' => 'Belgique',
        ]);

        Company::create([
            'name' => 'NARCISSE',
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => 'Rue de Monceau',
            'number' => '53',
            'box' => null,
            'city' => 'Paris',
            'zipcode' => '75008',
            'country' => 'France',
        ]);

        Company::create([
            'name' => 'Hello UGO',
            'legal_form' => null,
            'vat_number' => '0768368573',
            'vat_country_code' => 'BE',
            'street' => "Avenue du Prince d'Orange",
            'number' => '232',
            'box' => null,
            'city' => 'Uccle',
            'zipcode' => '1180',
            'country' => 'Belgique',
        ]);


        Company::create([
            'name' => "SITCA",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "SPICX",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "BELFIUS",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "ENTREPRENDRE.WAPI",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "CRESCO",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "FIDUCIA PARTNER",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "IFID",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "TEKHNE STUDIO",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "CONDORCET",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "IDETA",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "EE-CAMPUS",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "FEELIN",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "CBC",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "LM STUDIO",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "URIEL PIERCER",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "REVERSE CONSEIL",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "VINS BRUNIN",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "MICHAL CCS",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "GROUPE VANDECASTEELE",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "CHEZ BOBONNE",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "SOLUCIO",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "GROUPE S",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "INTEC BELGIUM",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "WAPICT",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "JAGUAR LAND ROVER TOURNAI",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "GHALAN",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);

        Company::create([
            'name' => "PHILIPPE DUMON",
            'legal_form' => null,
            'vat_number' => null,
            'vat_country_code' => null,
            'street' => null,
            'number' => null,
            'box' => null,
            'city' => null,
            'zipcode' => null,
            'country' => null,
        ]);
    }
}
