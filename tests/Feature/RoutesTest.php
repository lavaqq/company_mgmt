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
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function test_route_company_index(): void
    {
        $response = $this->get(route('company.index'));
        $response->assertStatus(200);
    }

    public function test_route_company_show(): void
    {
        $response = $this->get(route('company.show', Company::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_contact_index(): void
    {
        $response = $this->get(route('contact.index'));
        $response->assertStatus(200);
    }

    public function test_route_contact_show(): void
    {
        $response = $this->get(route('contact.show', Contact::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_credit_note_index(): void
    {
        $response = $this->get(route('credit-note.index'));
        $response->assertStatus(200);
    }

    public function test_route_credit_note_show(): void
    {
        $response = $this->get(route('credit-note.show', CreditNote::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_estimate_index(): void
    {
        $response = $this->get(route('estimate.index'));
        $response->assertStatus(200);
    }

    public function test_route_estimate_show(): void
    {
        $response = $this->get(route('estimate.show', Estimate::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_invoice_index(): void
    {
        $response = $this->get(route('invoice.index'));
        $response->assertStatus(200);
    }

    public function test_route_invoice_show(): void
    {
        $response = $this->get(route('invoice.show', Invoice::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_lead_index(): void
    {
        $response = $this->get(route('lead.index'));
        $response->assertStatus(200);
    }

    public function test_route_lead_show(): void
    {
        $response = $this->get(route('lead.show', Lead::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_deal_index(): void
    {
        $response = $this->get(route('deal.index'));
        $response->assertStatus(200);
    }

    public function test_route_deal_show(): void
    {
        $response = $this->get(route('deal.show', Deal::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_received_invoice_index(): void
    {
        $response = $this->get(route('received-invoice.index'));
        $response->assertStatus(200);
    }

    public function test_route_received_invoice_show(): void
    {
        $response = $this->get(route('received-invoice.show', ReceivedInvoice::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_project_index(): void
    {
        $response = $this->get(route('project.index'));
        $response->assertStatus(200);
    }

    public function test_route_project_show(): void
    {
        $response = $this->get(route('project.show', Project::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_task_index(): void
    {
        $response = $this->get(route('task.index'));
        $response->assertStatus(200);
    }

    public function test_route_task_show(): void
    {
        $response = $this->get(route('task.show', Task::all()->first()->id));
        $response->assertStatus(200);
    }

    public function test_route_user_index(): void
    {
        $response = $this->get(route('user.index'));
        $response->assertStatus(200);
    }

    public function test_route_user_show(): void
    {
        $response = $this->get(route('user.show', user::all()->first()->id));
        $response->assertStatus(200);
    }
}
