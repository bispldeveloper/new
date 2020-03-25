<?php namespace EyeCore\Modules\PageFormEnquiries\Notifications;

use EyeCore\Modules\PageFormEnquiries\Mailables\SendEnquiryMailable;
use Illuminate\Notifications\Notification;

class SendEnquiryNotification extends Notification
{

    /**
     * @param $pageFormEnquiry
     * @return string
     */
    public function via($pageFormEnquiry)
    {
        return 'mail';
    }

    /**
     * @param $pageFormEnquiry
     * @return SendEnquiryMailable
     */
    public function toMail($pageFormEnquiry)
    {
        return (new SendEnquiryMailable($pageFormEnquiry));
    }

}
