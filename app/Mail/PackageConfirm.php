<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\user;
class PackageConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $package_info;
    public function __construct(User $user,$package_info=array())
    {
        $this->user=$user;
        $this->package_info=$package_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('mail.confirm_package')->with('package_info',$this->package_info)
       ->subject('Package Purchasing Confirmation')
       ->to($this->user->email);
    }
}
