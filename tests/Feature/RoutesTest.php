<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Contact;
use App\Models\CreditNote;
use App\Models\Deal;
use App\Models\Estimate;
use App\Models\Invoice;
use App\Models\Lead;
use App\Models\Project;
use App\Models\ReceivedInvoice;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function test_company(): void
    {
        $response = $this->get('/test/company');
        $response->assertStatus(200);
    }

    public function test_company_id(): void
    {
        $response = $this->get('/test/company/' . Company::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_contact(): void
    {
        $response = $this->get('/test/contact');
        $response->assertStatus(200);
    }

    public function test_contact_id(): void
    {
        $response = $this->get('/test/contact/' . Contact::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_credit(): void
    {
        $response = $this->get('/test/credit-note');
        $response->assertStatus(200);
    }

    public function test_credit_id(): void
    {
        $response = $this->get('/test/credit-note/' . CreditNote::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_deal(): void
    {
        $response = $this->get('/test/deal');
        $response->assertStatus(200);
    }

    public function test_deal_id(): void
    {
        $response = $this->get('/test/deal/' . Deal::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_estimate(): void
    {
        $response = $this->get('/test/estimate');
        $response->assertStatus(200);
    }

    public function test_estimate_id(): void
    {
        $response = $this->get('/test/estimate/' . Estimate::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_invoice(): void
    {
        $response = $this->get('/test/invoice');
        $response->assertStatus(200);
    }

    public function test_invoice_id(): void
    {
        $response = $this->get('/test/invoice/' . Invoice::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_lead(): void
    {
        $response = $this->get('/test/lead');
        $response->assertStatus(200);
    }

    public function test_lead_id(): void
    {
        $response = $this->get('/test/lead/' . Lead::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_project(): void
    {
        $response = $this->get('/test/project');
        $response->assertStatus(200);
    }

    public function test_project_id(): void
    {
        $response = $this->get('/test/project/' . Project::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_received(): void
    {
        $response = $this->get('/test/received-invoice');
        $response->assertStatus(200);
    }

    public function test_received_id(): void
    {
        $response = $this->get('/test/received-invoice/' . ReceivedInvoice::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_task(): void
    {
        $response = $this->get('/test/task');
        $response->assertStatus(200);
    }

    public function test_task_id(): void
    {
        $response = $this->get('/test/task/' . Task::all()->first()->id);
        $response->assertStatus(200);
    }

    public function test_user(): void
    {
        $response = $this->get('/test/user');
        $response->assertStatus(200);
    }

    public function test_user_id(): void
    {
        $response = $this->get('/test/user/' . User::all()->first()->id);
        $response->assertStatus(200);
    }
}
