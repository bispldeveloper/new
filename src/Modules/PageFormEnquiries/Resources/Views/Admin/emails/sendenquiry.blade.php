@component('mail::message')
# {{ $pageFormEnquiry->pageform->name }}

You have received a new {{ $pageFormEnquiry->pageform->name }} enquiry.

**Referral URL**: [Click here]({{ $pageFormEnquiry->referral_url }})<br>
@foreach($pageFormEnquiry->fields as $name => $value)
**{{ ucwords(str_replace('_', ' ', $name)) }}**: {{ $value }}<br>
@endforeach

@component('mail::button', ['url' => route('mc-admin.pageformenquiries.show', $pageFormEnquiry->id)])
    View Enquiry
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent