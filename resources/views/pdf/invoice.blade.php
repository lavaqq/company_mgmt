<html>

<head>
    <title>{{ $invoice_number }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .header__logo {
            width: 150px;
            height: 25px;
        }

        .invoice__header {
            width: 100%;
            text-align: justify;
        }

        .invoice__header::after {
            content: "";
            display: inline-block;
            width: 100%;
        }

        .invoice__header .header__logo,
        .invoice__header>div {
            display: inline-block;
            vertical-align: top;
        }

        .invoice__header>div>div {
            margin-left: 20px;
        }

        .header__address {
            margin-bottom: 13px;
        }

        .invoice__infos {
            margin-top: 20px;
        }

        .invoice__header p {
            margin: 0;
            font-weight: 500;
            font-size: 8px;
            line-height: 164.5%;
        }

        .invoice__infos h1 {
            margin: 0;
            font-weight: 600;
            font-size: 24px;
            line-height: 36px;
        }

        .invoice__infos p {
            margin: 0;
            font-weight: 500;
            font-size: 8px;
            line-height: 164.5%;
        }

        .invoice__company {
            margin-top: 20px;
        }

        .invoice__company h2 {
            margin: 0;
            font-weight: 600;
            font-size: 12px;
            line-height: 18px;
        }

        .invoice__company p {
            margin: 0;
            font-weight: 500;
            font-size: 8px;
            line-height: 164.5%;
        }

        .invoice__table {
            margin-top: 20px;
        }

        .table__item {
            text-align: justify;
            padding: 4px 8px 4px 8px;
        }

        .table__item:after {
            content: "";
            display: inline-block;
            width: 100%;
        }

        .table__item p {
            margin: 0;
            display: inline-block;
            font-weight: 500;
            font-size: 8px;
            line-height: 164.5%;
        }

        .table__item.head {
            background: #35837D;
            color: white;
            font-weight: 600;
            font-size: 8px;
            line-height: 164.5%;
        }

        .table__item.result {
            font-weight: 700;
            font-size: 8px;
            line-height: 164.5%;
        }

        .separator {
            width: 100%;
            height: 0.5px;
            background: #ECECEC;
            margin: 0;
            border: none;
        }

        .separator.total {
            width: 100%;
            height: 0.5px;
            background: #35837D;
            margin: 0;
            border: none;
        }

        .payement {
            width: 350px;
            font-weight: 500;
            font-size: 8px;
            line-height: 164.5%;
            text-align: right;
            color: #595959;
            margin-left: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice__header">
        <img class="header__logo"
            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/logo.png'))) }}">
        <div class="header__info">
            <div class="header__address">
                <p>LOAK.STUDIO (SRL)</p>
                <p>RUE DU MOULIN A EAU (WI) 30</p>
                <p>7506 TOURNAI BELGIQUE</p>
                <p>BE0795704361</p>
            </div>
            <div class="header__contact">
                <p>+32 (0)489 14 44 89</p>
                <p>mathieu@loak.studio</p>
            </div>
        </div>
    </div>


    <div class="invoice__infos">
        <h1>Facture</h1>
        <p>NUMÉRO DE FACTURE : {{ $invoice_number }}</p>
        <p>DATE D'ÉMISSION : {{ $issue_date }}</p>
        <p>DATE D'ÉCHÉANCE : {{ $due_date }}</p>
    </div>
    <div class="invoice__company">
        <h2>À L'ATTENTION DE :</h2>
        <p>{{ strtoupper($name) }} ({{ $legal_form }})</p>
        <p>{{ $street }} {{ $number }} {{ $box }}</p>
        <p>{{ $zipcode }} {{ $city }} {{ $country }}</p>
        <p>{{ $vat_number }}</p>
    </div>

    <div class="invoice__table">
        <div class="table__item head">
            <p>Service</p>
            <p>Coût</p>
        </div>
        @foreach ($invoice_items as $item)
            <div class="table__item">
                <p>{{ $item['description'] }}</p>
                <p>{{ $item['amount'] }} €</p>
            </div>
            @if (!$loop->last)
                <hr class="separator">
            @endif
        @endforeach
        <hr class="separator total">
        @foreach ($invoice_discounts as $discount)
            <div class="table__item">
                <p>{{ $item['description'] }}</p>
                <p>-{{ $item['amount'] }}
                    @if ($discount->is_percentage)
                        %
                    @else
                        €
                    @endif
                </p>
            </div>
            <hr class="separator">
        @endforeach
        <div class="table__item">
            <p>Sous-total HTVA</p>
            <p>{{ $get_total_excl_tax }} €</p>
        </div>
        <hr class="separator">
        <div class="table__item">
            <p>TVA ({{ $tax_rate }}%)</p>
            <p>{{ $get_total_tax }} €</p>
        </div>
        <hr class="separator">
        <div class="table__item">
            <p>Total TTC</p>
            <p>{{ $get_total_incl_tax }} €</p>
        </div>
        <hr class="separator">
        <div class="table__item result">
            <p>Montant dû</p>
            <p>{{ $get_total_incl_tax }} €</p>
        </div>
    </div>
    <p class="payement">
        Veuillez payer le montant dû avant la date d'échéance sur le compte BE74 0689 4674 7107 avec
        {{ $vcs }}
        en tant que communication structurée.
    </p>
</body>

</html>
