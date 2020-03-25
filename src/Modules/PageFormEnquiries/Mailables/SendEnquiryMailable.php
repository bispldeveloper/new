<?php namespace EyeCore\Modules\PageFormEnquiries\Mailables;

use EyeCore\Modules\PageFormEnquiries\Models\PageFormEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEnquiryMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $pageFormEnquiry;

    /**
     * SendEnquiryMailable constructor.
     * @param PageFormEnquiry $pageFormEnquiry
     */
    public function __construct(PageFormEnquiry $pageFormEnquiry)
    {
        $this->pageFormEnquiry = $pageFormEnquiry;
    }

    /**
     * @return SendEnquiryMailable
     */
    public function build()
    {
        return $this->from($this->pageFormEnquiry->pageform->email_from)
            ->to($this->pageFormEnquiry->pageform->email_to)
            ->subject($this->pageFormEnquiry->pageform->email_subject)
            ->markdown('PageFormEnquiries::Admin.emails.sendenquiry');
    }

}
