<?php

namespace Database\Seeders;

use App\Models\ReceivedInvoice;
use Illuminate\Database\Seeder;

class ReceivedInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-06-01',
            'total_excl_vat' => 5.5,
            'tax' => 1.16,
            'file' => 'n93jYVQfaAXV5WgrZFcA/pA4OnLkAPpYynZ5s8F6JVKaf5RtySUqWQwiM1A52tz3gpAlOntaY3KpcjWKxarZl.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-06-01',
            'total_excl_vat' => 3,
            'tax' => 0.63,
            'file' => 'n93jYVQfaAXV5WgrZFcA/ZORoa9Njfkt2lD21wt75lv8aof6b2fYJbhoYaAEOA76DNDIlovuyDgt8O4hV763A.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-07-03',
            'total_excl_vat' => 6.9,
            'tax' => 1.45,
            'file' => 'n93jYVQfaAXV5WgrZFcA/2ufg6QKZpBUbyCBRLLrqPOr9wDETOv0T5AOoKVSjsnR6eXFnO4k0a8pfJXDJeytg.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-08-05',
            'total_excl_vat' => 3,
            'tax' => 0.63,
            'file' => 'n93jYVQfaAXV5WgrZFcA/uzfVH3CrsQDOm5XnqkO2VqFb0zxI7UwDS7ppvN9rTq8Q8fw9buUg74wEXH1erQl0.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-08-25',
            'total_excl_vat' => 76.4,
            'tax' => 16.05,
            'file' => 'n93jYVQfaAXV5WgrZFcA/tfpUZ4gsSHu25FB7axn3FJ1PKas7K8kHrzJu1RPzqaGh5ZioFDxH6wf7gchHjNGZ.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-08-25',
            'total_excl_vat' => 195.98,
            'tax' => 41.16,
            'file' => 'n93jYVQfaAXV5WgrZFcA/azVkDeQwWharebnQDrRJES4zL4OkNddCyME8aLBTMfiZsttIAx4YLezzO8Kue79q.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-09-05',
            'total_excl_vat' => 2.6,
            'tax' => 0.55,
            'file' => 'n93jYVQfaAXV5WgrZFcA/RtfKHtqcXslEeSxMgTfyLDB9qdBgfjqKQ9VDs410I8rfYGmIBpKeyqiSu4ZRWwUG.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-09-12',
            'total_excl_vat' => 3,
            'tax' => 0.63,
            'file' => 'n93jYVQfaAXV5WgrZFcA/zaptFiAyTZJbgtID8tDiPn6FygKvSJfd81foX3ZVhUVPl0R3Ve1mAufGXjOdiFAz.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-09-20',
            'total_excl_vat' => 83.99,
            'tax' => 17.64,
            'file' => 'n93jYVQfaAXV5WgrZFcA/zo8RMQ1awwypBgGl3yOFjKvjJ3abkc62lpowU1LlIxfv8KKzCst4npYINLqltUOb.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-10-04',
            'total_excl_vat' => 3.5,
            'tax' => 0.74,
            'file' => 'n93jYVQfaAXV5WgrZFcA/hcda6f5jgXIxvXGa7spq2gxtNGTBt9Ed15WsDFUkGo2PIwNg6CoWwzPnJuAvzYho.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-10-12',
            'total_excl_vat' => 1.94,
            'tax' => 0.41,
            'file' => 'n93jYVQfaAXV5WgrZFcA/fH9leOw8XNMj7To0safhGZ1ZRWB8P6zjZ855hjgxadTmqG5w3rOnVFEejLN99wi6.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-11-01',
            'total_excl_vat' => 3,
            'tax' => 0.63,
            'file' => 'n93jYVQfaAXV5WgrZFcA/xMT1aEfKcsVwI5wUdM5YRuxgDSCbw2ZAIfvTICUKfFYUBoa1TkJlHcVzXuAANCij.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-11-07',
            'total_excl_vat' => 0.88,
            'tax' => 0.18,
            'file' => 'n93jYVQfaAXV5WgrZFcA/eS95UBr4Ik7Wbxb5VdI4Q6yMQAi7hDjpCpuxj28qmeBTB26athMj7QKfQAXtytAO.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-11-10',
            'total_excl_vat' => 2.73,
            'tax' => 0.57,
            'file' => 'n93jYVQfaAXV5WgrZFcA/4dDedIWyjLJzVDbpFxbVRDlX1NdxWy6v3ANXNBXOsGQmfzqCiLGIxhg485UUPg2b.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-11-11',
            'total_excl_vat' => 38.2,
            'tax' => 8.02,
            'file' => 'n93jYVQfaAXV5WgrZFcA/6sTlBwzP64OYltsKO90qxXNEn0yfKRqHX2wZ0l8OIbzGEahijjqFfulvsjkwTShY.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2022-12-02',
            'total_excl_vat' => 5.8,
            'tax' => 1.22,
            'file' => 'n93jYVQfaAXV5WgrZFcA/VPmmisXpNdHRq0fHunFvwVhnIWZfcWe7XpEHCBwkIc3R7XjdonKVlahAeBFVDYsy.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-01',
            'total_excl_vat' => 5.8,
            'tax' => 1.22,
            'file' => 'n93jYVQfaAXV5WgrZFcA/z7ehsuKsN8dRO0U00a4dRAALek98iDjzfYbu3MrbwjiZEo7bpJANEHfnxEBmOrVi.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-03',
            'total_excl_vat' => 1280.99,
            'tax' => 269.01,
            'file' => 'n93jYVQfaAXV5WgrZFcA/aTCJP8ddo9FVd584GjgMj8xnubKSvaxQ9dtWUfnF5XLYZqcUVi1tIsciTpVpXKjK.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-03',
            'total_excl_vat' => 50,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/aTCJP8ddo9FVd584GjgMj8xnubKSvaxQ9dtWUfnF5XLYZqcUVi1tIsciTpVpXKjK.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-10',
            'total_excl_vat' => 193.2,
            'tax' => 40.57,
            'file' => 'n93jYVQfaAXV5WgrZFcA/rGYYNzY2zektSicSKVIC3I1s6PzDbSj3GLhtY1UBjs8UT7xbFLrQ0BVDxY8WuvI1.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-16',
            'total_excl_vat' => 101,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/zClM8lMMAnuNe26dHYalSkT0rbHuqN8FL4EpDBBh2J7OIPPX5WHD8EcWxufdwaLc.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-20',
            'total_excl_vat' => 293.01,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/VnpaCDJ0lyvCikdJGc2HpM05Ond4iwQv6z8zoUQi0C0N00CdlPFU0ezLbxBAsHc4.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-23',
            'total_excl_vat' => 3.5,
            'tax' => 0.74,
            'file' => 'n93jYVQfaAXV5WgrZFcA/ieGxVwbMayW5vgqOk2hGXkGTQ9Ozk3hWuu7LwIntjZa62sFEj5FagtG4vzuboizN.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-01-23',
            'total_excl_vat' => 18,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/d4A7r3wOSQiEy4Xx2hU6SEuPwMQkua4OYJCNMgkvGhpHBzeInqL0MlD8okp80XoK.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-02-01',
            'total_excl_vat' => 69.99,
            'tax' => 14.70,
            'file' => 'n93jYVQfaAXV5WgrZFcA/7bHZs2bgEMHPdihBP7mVZysUREOSXdGUdIC4v75gwGdEIxVa95DmYPepd6CWiMsr.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-02-01',
            'total_excl_vat' => 7.02,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/SFlz0f22e8SaMrp2spVsJVEBYwbmWwvYQ11GHlffPyfj8YDF2IITn1DdACyKwkJV.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-02-02',
            'total_excl_vat' => 4.1,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/rmO1nylbSfsl4qKV0S6CYWCZekarNjwITKW4Q1hINKWcwTFRdkSXR2et6zY3K8ZI.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-02-21',
            'total_excl_vat' => 6.88,
            'tax' => 0.41,
            'file' => 'n93jYVQfaAXV5WgrZFcA/MxaXMoeheSFF6BVIaYKOhjB2adUIBWZROtbdSCUy51vnNnfQSKHhnkzGHboWJDsX.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-02-23',
            'total_excl_vat' => 0.75,
            'tax' => 0.16,
            'file' => 'n93jYVQfaAXV5WgrZFcA/yLoiePVOa7IrGBTUSXMdFWE5rEoqgzCkX6sPyGDvietEhdC9UtLg906np8xOXCae.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-01',
            'total_excl_vat' => 9.3,
            'tax' => 1.95,
            'file' => 'n93jYVQfaAXV5WgrZFcA/PyupliI3Oip8DeyGjID5G0kS8aBpxDiF7uNClumxiWXC5BXaTir7lySzAemLhu4l.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-02',
            'total_excl_vat' => 3.29,
            'tax' => 0.69,
            'file' => 'n93jYVQfaAXV5WgrZFcA/dBqFCYZZKAzG2Ll8I4VR8kQcsOopooUFfp1RJ9M58GgEevhU3qY7CDQI4RwwIpif.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-03',
            'total_excl_vat' => 3.09,
            'tax' => 0.65,
            'file' => 'n93jYVQfaAXV5WgrZFcA/8aeLcBYCBsPei1ZWA1fNvXjGT3l3nEsmtGajxo4PoD8HLfCNMtTbzHJkuz1nPRcX.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-21',
            'total_excl_vat' => 90,
            'tax' => 0,
            'file' => 'n93jYVQfaAXV5WgrZFcA/KihpwmjiN8bhmBCTzbMkC3unDj77oi9HHQBBSzHv53VNzzyt9jquqsiKItDXQfmB.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-29',
            'total_excl_vat' => 301,
            'tax' => 63.21,
            'file' => 'n93jYVQfaAXV5WgrZFcA/GS33OGaHJFaJJNobJFHjKOJvILKa7WPR08CnhXmr2pQl4GwdRv9T8dJDehxcB6K5.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-30',
            'total_excl_vat' => 790.83,
            'tax' => 166.07,
            'file' => 'n93jYVQfaAXV5WgrZFcA/25SAmnC1m97aQghGzIfeLeclL1miu11brf4LDInWtJVaLU8xbIo92jYzREHkbYb3.pdf',
            'in_falco' => true,
        ]);

        ReceivedInvoice::create([
            'company_id' => 1,
            'issue_date' => '2023-03-30',
            'total_excl_vat' => 776.03,
            'tax' => 162.97,
            'file' => 'n93jYVQfaAXV5WgrZFcA/evbLUjHkDX3xXnx9atxL21mSoGBRN7TVZjWujE9CT4vsmBs2jImWk93JTeK4Fpxm.pdf',
            'in_falco' => true,
        ]);
    }
}
