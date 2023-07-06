<?php

namespace Database\Seeders;

use App\Models\Estimate;
use App\Models\EstimateDiscount;
use App\Models\EstimateItem;
use Illuminate\Database\Seeder;

class EstimateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0001',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/BdtGIgUVowAURKDavalHmMImMhpXfbXbKPQGVGW4sO5t7H0sfDEvBkK8A6U09Tun.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 1,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 1,
            'description' => 'Développement du système de gestion de contenu',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 1,
            'description' => 'Intégration et développement du site web',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 1,
            'description' => 'Hébergement (annualité)',
            'amount' => 0,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0002',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/R03janZfyOYpdlq0LwXjNAg9pTkKP3zkcEmSItBPNgiehLmWVmwPU9ETfaAUUk7e.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 2,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 2,
            'description' => 'Développement du système de gestion de contenu',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 2,
            'description' => 'Intégration et développement du site web',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 2,
            'description' => 'Hébergement (annualité)',
            'amount' => 60,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0003',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/xyuh5h2GBorgmEALy7praMy4c4NFtUB3hey1j63xiDcCct4dY3Vvlltjatt9MOzt.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 3,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0004',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/kS9qGvvT90wzeqOdxsBqO6HtEgCIGRTkPs9WQDSqQiYnoHsKyZJhORUZy0oaYnkk.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 4,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 4,
            'description' => 'Développement du système de gestion de contenu',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 4,
            'description' => 'Intégration et développement du site web',
            'amount' => 0,
        ]);

        EstimateItem::create([
            'estimate_id' => 4,
            'description' => 'Hébergement et analytics (annualité)',
            'amount' => 60,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0005',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/Jumf820CzdgEPFTDPbrMRgaXeG6wXpiy6EfQpq7ocI63RvQoss5HIdTD1AH2JY9l.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 5,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        EstimateItem::create([
            'estimate_id' => 5,
            'description' => 'Nom de domaine (annualité)',
            'amount' => 20,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0006',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/xtNU6EozBKGrGow0XnkUTbMMvmGekG9W5aSjJH2eZHcU2rYjrWdV3Yy6bSEjZmeF.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 6,
            'description' => 'Bannière promotionnelle',
            'amount' => 90,
        ]);

        EstimateItem::create([
            'estimate_id' => 6,
            'description' => 'Encart promotionnel',
            'amount' => 40,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0007',
            'tax_rate' => 21,
            'issue_date' => '2022-11-07',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/LtH8ggsXt16fuoPPyI6AfaDme3fYjVn3P1eyEUfE7QmwotFLjWqi5UNPyGykW7l2.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 7,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 3600,
        ]);

        EstimateItem::create([
            'estimate_id' => 7,
            'description' => 'Intégration et développement',
            'amount' => 3400,
        ]);

        EstimateItem::create([
            'estimate_id' => 7,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0008',
            'tax_rate' => 21,
            'issue_date' => '2022-11-09',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/Gqh0UOtUZXqEhoO41mrRs4sqEOFDSttPSN5EIQ3LY0ufpnEGR1BvzqdRg4YZE22f.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 8,
            'description' => "Intégration d'une maquette",
            'amount' => 1800,
        ]);

        EstimateItem::create([
            'estimate_id' => 8,
            'description' => "Développement d'un système de gestion de contenu",
            'amount' => 1080,
        ]);

        EstimateItem::create([
            'estimate_id' => 8,
            'description' => 'Mise en production sur un serveur',
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0009',
            'tax_rate' => 21,
            'issue_date' => '2022-11-16',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/qEnyjipw4E8afWNatDCDLw5qXvlqQ5iI7kYlGZ6XPjTqmcKE0GMrveIpb8YYUpqg.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 9,
            'description' => 'Analyse de l’application & présentation',
            'amount' => 600,
        ]);

        EstimateItem::create([
            'estimate_id' => 9,
            'description' => 'Structure UX (UX Design)',
            'amount' => 1200,
        ]);

        EstimateItem::create([
            'estimate_id' => 9,
            'description' => 'Design de l’application (UI design)',
            'amount' => 1450,
        ]);

        EstimateItem::create([
            'estimate_id' => 9,
            'description' => 'Prototypage',
            'amount' => 400,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0010',
            'tax_rate' => 21,
            'issue_date' => '2022-11-15',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/hwjW4zz3b5JCTQJoNY5vS4RzKWZI7T0lsXnRW1lda8c6Fnw1uz2Cr4oQbbyPv5sS.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 10,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 1225,
        ]);

        EstimateItem::create([
            'estimate_id' => 10,
            'description' => 'Développement des deux simulateurs',
            'amount' => 725,
        ]);

        EstimateItem::create([
            'estimate_id' => 10,
            'description' => 'Développement du système de gestion de contenu',
            'amount' => 925,
        ]);

        EstimateItem::create([
            'estimate_id' => 10,
            'description' => 'Intégration et développement',
            'amount' => 625,
        ]);

        EstimateItem::create([
            'estimate_id' => 10,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        EstimateDiscount::create([
            'estimate_id' => 10,
            'description' => 'Hébergement (annualité)',
            'is_percentage' => false,
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0011',
            'tax_rate' => 21,
            'issue_date' => '2022-12-06',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/wsi7lp39OtFyCKCuAew3CgxVYu4Tdw8FPJe8KgLnqVNFbMxZtPtFPZKJ3DAq7xt3.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 11,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 300,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0012',
            'tax_rate' => 0,
            'issue_date' => '2022-11-16',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/GMPtCeZwTsOEpzszE2obSKUvMAxxIB2E1YKPMUNrCsDdnqWccyqYNq9rrlnqTujv.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 12,
            'description' => 'Intégration de la maquette',
            'amount' => 1250,
        ]);

        EstimateItem::create([
            'estimate_id' => 12,
            'description' => 'Développement du sytème de gestion de contenu',
            'amount' => 350,
        ]);

        EstimateItem::create([
            'estimate_id' => 12,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0013',
            'tax_rate' => 21,
            'issue_date' => '2022-11-30',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/TTS5mZrKqcFGces5O3uOkANEJwLVzOMoyoNST9g6MSHG6gB1spHO8dAkQku0qQYh.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 13,
            'description' => 'Encart promotionnel',
            'amount' => 40,
        ]);

        EstimateItem::create([
            'estimate_id' => 13,
            'description' => 'Encart promotionnel',
            'amount' => 40,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0014',
            'tax_rate' => 21,
            'issue_date' => '2022-12-13',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/jShHJHVnsrQGlM4IzJx8Rdbh6BrYTSP1OLFsq0PMI5uhZfOY4R7d6yCs3rMNsvfp.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 14,
            'description' => 'Création de supports visuels',
            'amount' => 150,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0015',
            'tax_rate' => 21,
            'issue_date' => '2022-12-15',
            'deadline' => null,
            'status' => 'refused',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/LiUjQKgz4mtOc41lCfh4shMqdT4hujizTNMrl4OFkIHiQ8F2z2PqZ9PiU9A9ft9M.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 15,
            'description' => "Création de l'avatar (4 niveaux)",
            'amount' => 1000,
        ]);

        EstimateItem::create([
            'estimate_id' => 15,
            'description' => 'Version du story-board au crayon',
            'amount' => 500,
        ]);

        EstimateItem::create([
            'estimate_id' => 15,
            'description' => 'Version du story-board numérisé',
            'amount' => 500,
        ]);

        EstimateItem::create([
            'estimate_id' => 15,
            'description' => "Design des éléments de l'application pour mettre en scène les visuels",
            'amount' => 600,
        ]);

        EstimateItem::create([
            'estimate_id' => 15,
            'description' => "Création de 6 visuels",
            'amount' => 1400,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0016',
            'tax_rate' => 21,
            'issue_date' => '2022-12-19',
            'deadline' => null,
            'status' => 'refused',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/UVHkTypt3N8SFqyfz2sw4T0plc6ORE0PQViyH1HiqkoRYpiaupNw5l81TGHNokB5.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 16,
            'description' => "UX Design (structure, design, prototypage, ...)",
            'amount' => 1500,
        ]);

        EstimateItem::create([
            'estimate_id' => 16,
            'description' => "Intégration et développement",
            'amount' => 1700,
        ]);

        EstimateItem::create([
            'estimate_id' => 16,
            'description' => "Hébergement (annualité)",
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0017',
            'tax_rate' => 21,
            'issue_date' => '2023-01-17',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/DFwhKL1g69iAzDEJWORh7ofA7r2gcaL7BYcB0k33d1VqsDuwBPf61Nl2oRyE5TIr.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 17,
            'description' => "Hébergement (annualité)",
            'amount' => 120,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0018',
            'tax_rate' => 21,
            'issue_date' => '2023-01-31',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/xwb7ZSRTSfCIjaHdYzCr9hl0cr1C8PucRzcJnVBa0egkgUcI3JzdKYzruQ8ddeND.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 18,
            'description' => "Achat du module",
            'amount' => 69.99,
        ]);

        EstimateItem::create([
            'estimate_id' => 18,
            'description' => "Installation et configuration du module",
            'amount' => 35,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0019',
            'tax_rate' => 21,
            'issue_date' => '2023-03-06',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/RjBV1idp42hU1syz58NUp1NjmaQz4tUz1RfUHZM18vtOY2S3YmDtLBLvevivTKvF.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 19,
            'description' => "Design de 2 visuels pour un stand de MyQM",
            'amount' => 212.50,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0020',
            'tax_rate' => 21,
            'issue_date' => '2023-06-02',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
            'external_estimate' => 'Fv7ejLY4q2HJZBvMPTRd/vXro1mUXXj8CmCBgrgFkIjisqCZl0zqGy0QhgR1FaDBPRlZLmTdGPbppelP6gcsH.pdf'
        ]);

        EstimateItem::create([
            'estimate_id' => 20,
            'description' => "Réalisation de la maquette",
            'amount' => 300,
        ]);

        Estimate::create([
            'deal_id' => 1,
            'reference' => 'D-0021',
            'tax_rate' => 21,
            'issue_date' => '2023-06-02',
            'deadline' => null,
            'status' => 'signed',
            'prepayment' => false,
        ]);

        EstimateItem::create([
            'estimate_id' => 21,
            'description' => 'Suppression du malware dans le wordpress',
            'amount' => 180,
        ]);
    }
}
