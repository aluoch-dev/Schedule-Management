<?php
namespace App\Http\Controllers;
namespace App\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Appointment;
use App\User;
use App\Assign;


class AssignMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The appointment instance and the user instance.
     *
     * @var Appointment
     * @var User
     * 
     */
    public $assign;
    public $appointment;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment, Assign $assign, User $user)
    {
        $this->Assign = $assign;
        $this->Appointment = $appointment;
        $this->User = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Appointment Assignment')
            ->view('Appointment.assign')->withAppointment($this->appointment)->withUser($this->$user)->withAssign($this->assign);   
    }
}
