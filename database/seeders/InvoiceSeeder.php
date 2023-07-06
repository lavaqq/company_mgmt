<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0001',
            'vcs' => null,
            'issue_date' => '2023-01-13',
            'due_date' => '2023-02-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/bqgyUkvNxYmVAxa3oL6oYCP4n4LsKpHkqyc5rhtbJYNzumGCG00qnUyD7dwKrjwU.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0002',
            'vcs' => null,
            'issue_date' => '2023-01-13',
            'due_date' => '2023-02-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/iAkqGp9VCvZx0MYCFzamArDRFBZqZ7h03BVqiVxyfDfzcrNP1Diwi7kucfBdgYKg.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0003',
            'vcs' => null,
            'issue_date' => '2023-01-13',
            'due_date' => '2023-02-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/kmyBtwR1b7G1e546sP6E8BErCQ8GJQxr3qze61QVq9NUQRjQNniV5XydreuQXAJK.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0004',
            'vcs' => null,
            'issue_date' => '2023-01-13',
            'due_date' => '2023-02-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/yGmxFyGNx83feJPm3gryNYHEKPgKy8s4XQy97h0bsBC47w4pP8s8xyMg29BFMP0i.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0005',
            'vcs' => null,
            'issue_date' => '2023-01-13',
            'due_date' => '2023-02-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/kN7JBW2ENXwLC5ttH9nCf9ah3DhHFyLbb8M3TTnZeKAfbDTFvqANyHV9BLF20MNA.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0006',
            'vcs' => null,
            'issue_date' => '2023-01-13',
            'due_date' => '2023-02-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/BMyMwTEBxGav98FQNgy4K7F51TUFuee02p6duewCsCHoV9bf73VBMy3LyELF3Qxu.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0007',
            'vcs' => null,
            'issue_date' => '2023-01-16',
            'due_date' => '2023-02-16',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/64J9FuYBUNVDQE9Dtnxuy6jUFKfJETJBMP2pxWAGjbzcfqPU93qTTR5MNnLAZG7C.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0008',
            'vcs' => null,
            'issue_date' => '2023-02-01',
            'due_date' => '2023-03-03',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/Ze10cz1qyGfhobHBtnsJghGZ05gLJDGyrc2ybmdtUXwAVvMaXT8zKLXNdHfPZmA1.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0009',
            'vcs' => null,
            'issue_date' => '2023-03-01',
            'due_date' => '2023-03-16',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/EV43onaoje74YHLRe3m24dbEsuMKAw1pua30FfAKTQxzm4zVTeeN6BT4BfLoBL92.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0010',
            'vcs' => null,
            'issue_date' => '2023-03-13',
            'due_date' => '2023-03-28',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/9kRykyD13dAaPdqh7pvF0jpK6VmaFkQLLA7y5dx2h7We0zVzdeBisqWNC5hew7EE.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0011',
            'vcs' => null,
            'issue_date' => '2023-03-13',
            'due_date' => '2023-03-28',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/v5RwQbrvDdEWpoaPErssH2g1q02mkDAEk7FFh33EfKvB1Q9HqsXNZznebuw7RDro.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0012',
            'vcs' => null,
            'issue_date' => '2023-03-13',
            'due_date' => '2023-03-28',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/RQyUteqppaqKepx8NEdVYWo0XdskAYUcUhavMQ0rksuh6VmC5C8dHesm6gqrAda2.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0013',
            'vcs' => null,
            'issue_date' => '2023-03-13',
            'due_date' => '2023-03-28',
            'tax_rate' => 0,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/rZ9kkWuqk48RkwrhtkWJxwnh5bzVopUPQA7g9XRCD9t0ri5anf6X9APWfUnr6bAx.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0014',
            'vcs' => null,
            'issue_date' => '2023-03-15',
            'due_date' => '2023-03-30',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/eCfy3cpvfMa03rD8gqT4tKwK0r9XD7WvucFFRkg0Kv5Zec0xvkG4LfkjEDwEFqhY.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0015',
            'vcs' => null,
            'issue_date' => '2023-03-16',
            'due_date' => '2023-03-31',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/LdmCWFf1Z4J2NuYVxdfG5fM4jK1rPunE8p36s14gas65kroTQRXJX1djE0xnX6P1.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0016',
            'vcs' => null,
            'issue_date' => '2023-03-21',
            'due_date' => '2023-04-04',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/by9cit0M3sK03pkK8YWNyd0qXDjcmcTGf3A88TUuM2FT4wuo6Gg8ig4tdcA7VQaJ.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0017',
            'vcs' => null,
            'issue_date' => '2023-03-22',
            'due_date' => '2023-04-05',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/nYxBWd0jvZhsb26wJq2kr4UaxPosnX85qFaYvcsPsX6TtoFt1kpi9CXVADsMhs1u.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0018',
            'vcs' => null,
            'issue_date' => '2023-04-12',
            'due_date' => '2023-05-12',
            'tax_rate' => 21,
            'status' => 'paid',
            'external_invoice' => 'Xz5Tb6bzfUM4ZgzyhDmE/pPK2KmfvY5fZ9DerBzonWZQwiXMgRZbqTkZmMepzvK2EgZ4FAXMHMZtWZyvEtGd0.pdf',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0019',
            'vcs' => null,
            'issue_date' => '2023-04-25',
            'due_date' => '2023-05-25',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0020',
            'vcs' => null,
            'issue_date' => '2023-05-03',
            'due_date' => '2023-06-03',
            'tax_rate' => 21,
            'status' => 'cancelled',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0021',
            'vcs' => null,
            'issue_date' => '2023-05-03',
            'due_date' => '2023-06-03',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0022',
            'vcs' => null,
            'issue_date' => '2023-05-03',
            'due_date' => '2023-06-03',
            'tax_rate' => 0,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0023',
            'vcs' => null,
            'issue_date' => '2023-05-09',
            'due_date' => '2023-06-09',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0024',
            'vcs' => null,
            'issue_date' => '2023-05-26',
            'due_date' => '2023-06-26',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0025',
            'vcs' => null,
            'issue_date' => '2023-06-02',
            'due_date' => '2023-07-02',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0026',
            'vcs' => null,
            'issue_date' => '2023-06-02',
            'due_date' => '2023-07-02',
            'tax_rate' => 0,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0027',
            'vcs' => null,
            'issue_date' => '2023-06-02',
            'due_date' => '2023-07-02',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0028',
            'vcs' => null,
            'issue_date' => '2023-06-02',
            'due_date' => '2023-07-02',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0029',
            'vcs' => null,
            'issue_date' => '2023-06-12',
            'due_date' => '2023-07-12',
            'tax_rate' => 21,
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0030',
            'vcs' => null,
            'issue_date' => '2023-06-22',
            'due_date' => '2023-07-22',
            'tax_rate' => 21,
            'status' => 'sended',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => 'LS-0031',
            'vcs' => null,
            'issue_date' => '2023-06-22',
            'due_date' => '2023-07-22',
            'tax_rate' => 21,
            'status' => 'sended',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => "LS-0032",
            'vcs' => "+++ 003 / 2300 / 62311 +++",
            'tax_rate' => 21,
            'issue_date' => '2023-06-30',
            'due_date' => '2023-07-30',
            'status' => 'paid',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => "LS-0033",
            'vcs' => "+++ 003 / 3030 / 72389 +++",
            'tax_rate' => 21,
            'issue_date' => '2023-07-03',
            'due_date' => '2023-08-03',
            'status' => 'sended',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => "LS-0034",
            'vcs' => "+++ 003 / 4030 / 72319 +++",
            'tax_rate' => 21,
            'issue_date' => '2023-07-03',
            'due_date' => '2023-08-03',
            'status' => 'sended',
        ]);

        Invoice::create([
            'deal_id' => 1,
            'in_falco' => true,
            'reference' => "LS-0035",
            'vcs' => "+++ 003 / 5030 / 72346 +++",
            'tax_rate' => 21,
            'issue_date' => '2023-07-03',
            'due_date' => '2023-08-03',
            'status' => 'paid',
        ]);

        InvoiceItem::create([
            'invoice_id' => 32,
            'description' => 'Réserve horaire de 25h',
            'amount' => 1250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 33,
            'description' => 'Adaptation des designs du site web',
            'amount' => 250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 34,
            'description' => 'Maintenance site web et gestion de contenu',
            'amount' => 250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 35,
            'description' => "Design d'un formulaire de demande de mutuelle santé pour le Cabinet Mono",
            'amount' => 325,
        ]);

        InvoiceItem::create([
            'invoice_id' => 1,
            'description' => 'Hébergement (annualité)',
            'amount' => 60,
        ]);

        InvoiceItem::create([
            'invoice_id' => 2,
            'description' => 'Bannière promotionnelle',
            'amount' => 90,
        ]);

        InvoiceItem::create([
            'invoice_id' => 2,
            'description' => 'Encart promotionnel',
            'amount' => 40,
        ]);

        InvoiceItem::create([
            'invoice_id' => 3,
            'description' => 'Encart promotionnel',
            'amount' => 40,
        ]);

        InvoiceItem::create([
            'invoice_id' => 3,
            'description' => 'Encart promotionnel',
            'amount' => 40,
        ]);

        InvoiceItem::create([
            'invoice_id' => 4,
            'description' => 'Création de supports visuels',
            'amount' => 150,
        ]);

        InvoiceItem::create([
            'invoice_id' => 5,
            'description' => 'Analyse de l’application & présentation',
            'amount' => 600,
        ]);

        InvoiceItem::create([
            'invoice_id' => 5,
            'description' => 'Structure UX (UX Design)',
            'amount' => 1200,
        ]);

        InvoiceItem::create([
            'invoice_id' => 5,
            'description' => 'Design de l’application (UI design)',
            'amount' => 1450,
        ]);

        InvoiceItem::create([
            'invoice_id' => 5,
            'description' => 'Prototypage',
            'amount' => 400,
        ]);

        InvoiceItem::create([
            'invoice_id' => 6,
            'description' => 'UX/UI Design (design, prototypage, ...)',
            'amount' => 300,
        ]);

        InvoiceItem::create([
            'invoice_id' => 7,
            'description' => 'Première facturation ITPEAK représentant 2/3 du sous-total HTVA de 3000€ du devis référant.',
            'amount' => 2000,
        ]);

        InvoiceItem::create([
            'invoice_id' => 8,
            'description' => 'Achat du module',
            'amount' => 69.99,
        ]);

        InvoiceItem::create([
            'invoice_id' => 8,
            'description' => 'Installation et configuration du module',
            'amount' => 35,
        ]);

        InvoiceItem::create([
            'invoice_id' => 9,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 3600,
        ]);

        InvoiceItem::create([
            'invoice_id' => 9,
            'description' => 'Intégration et développement',
            'amount' => 3400,
        ]);

        InvoiceItem::create([
            'invoice_id' => 9,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        InvoiceItem::create([
            'invoice_id' => 10,
            'description' => 'Hébergement de anro.agency (annualité)',
            'amount' => 120,
        ]);

        InvoiceItem::create([
            'invoice_id' => 11,
            'description' => 'Design du stand de MyQM',
            'amount' => 300,
        ]);

        InvoiceItem::create([
            'invoice_id' => 12,
            'description' => 'UX Design (structure, design, prototypage, ...)',
            'amount' => 1225,
        ]);

        InvoiceItem::create([
            'invoice_id' => 12,
            'description' => 'Développement des deux simulateurs',
            'amount' => 725,
        ]);

        InvoiceItem::create([
            'invoice_id' => 12,
            'description' => 'Développement du système de gestion de contenu',
            'amount' => 925,
        ]);

        InvoiceItem::create([
            'invoice_id' => 12,
            'description' => 'Intégration et développement',
            'amount' => 625,
        ]);

        InvoiceItem::create([
            'invoice_id' => 12,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        InvoiceItem::create([
            'invoice_id' => 13,
            'description' => "Acompte pour l'intégration et le développement du système de gestion de contenu ( 30 % de 1 600,00 €)",
            'amount' => 480,
        ]);

        InvoiceItem::create([
            'invoice_id' => 14,
            'description' => 'Deuxième facturation ITPEAK représentant 1/3 du sous-total HTVA de 3000€.',
            'amount' => 1000,
        ]);

        InvoiceItem::create([
            'invoice_id' => 15,
            'description' => 'Maintenance site web et gestion de contenu',
            'amount' => 250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 16,
            'description' => 'Flyer recto verso',
            'amount' => 100,
        ]);

        InvoiceItem::create([
            'invoice_id' => 16,
            'description' => 'Rollup 1',
            'amount' => 50,
        ]);

        InvoiceItem::create([
            'invoice_id' => 16,
            'description' => 'Rollup 2',
            'amount' => 50,
        ]);

        InvoiceItem::create([
            'invoice_id' => 17,
            'description' => 'Réserve horaire de 25h',
            'amount' => 1250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 18,
            'description' => 'Ajout d’éléments sur la page contact, dans le menu de navigation et intégration chat Odoo',
            'amount' => 100,
        ]);

        InvoiceItem::create([
            'invoice_id' => 19,
            'description' => 'Intégration de la maquette de innovation-lab.be',
            'amount' => 350,
        ]);

        InvoiceItem::create([
            'invoice_id' => 20,
            'description' => 'Design de la landing page de Archit3d',
            'amount' => 240,
        ]);

        InvoiceItem::create([
            'invoice_id' => 21,
            'description' => 'Maintenance site web et gestion de contenu',
            'amount' => 250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 22,
            'description' => "Paiement à la livraison de l'intégration et le développement du système de gestion de contenu (40 % de 1 600,00 €)",
            'amount' => 640,
        ]);

        InvoiceItem::create([
            'invoice_id' => 22,
            'description' => 'Hébergement (annualité)',
            'amount' => 120,
        ]);

        InvoiceItem::create([
            'invoice_id' => 23,
            'description' => "Design et intégration d'une landing page pour dealview.be",
            'amount' => 400,
        ]);

        InvoiceItem::create([
            'invoice_id' => 24,
            'description' => 'Modification sur le site web "zebatuca.be"',
            'amount' => 200,
        ]);

        InvoiceItem::create([
            'invoice_id' => 25,
            'description' => 'Maintenance site web et gestion de contenu',
            'amount' => 250,
        ]);

        InvoiceItem::create([
            'invoice_id' => 26,
            'description' => "Solde restant de l'intégration et le développement du système de gestion de contenu",
            'amount' => 480,
        ]);

        InvoiceItem::create([
            'invoice_id' => 27,
            'description' => "Acompte pour la conception du design et l'intégration de Qonvers.ai (40 % de 5 814,00 €)",
            'amount' => 2325.6,
        ]);

        InvoiceItem::create([
            'invoice_id' => 28,
            'description' => 'Support génération de facture',
            'amount' => 120,
        ]);

        InvoiceItem::create([
            'invoice_id' => 29,
            'description' => 'Design de la landing page de Archit3d',
            'amount' => 240,
        ]);

        InvoiceItem::create([
            'invoice_id' => 30,
            'description' => 'Suppression du malware dans le wordpress',
            'amount' => 180,
        ]);

        InvoiceItem::create([
            'invoice_id' => 31,
            'description' => 'Adaptation du stand de MyQM',
            'amount' => 65,
        ]);

        InvoiceDiscount::create([
            'invoice_id' => 11,
            'description' => 'Gestion de client par PRISM VIDEO',
            'is_percentage' => true,
            'amount' => 15,
        ]);

        InvoiceDiscount::create([
            'invoice_id' => 12,
            'description' => 'Hébergement (offert la première année)',
            'is_percentage' => false,
            'amount' => 120,
        ]);

        InvoiceDiscount::create([
            'invoice_id' => 16,
            'description' => 'Gestion de client par PRISM VIDEO',
            'is_percentage' => true,
            'amount' => 15,
        ]);
    }
}
