<?php
namespace App\Mail;

 // Assuming Hotel model is in 'App\Models' namespace
use App\Models\Hotel\Hotel;
use App\Models\Accommodation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $hotel;

    /**
     * Create a new message instance.
     */
    public function __construct(Accommodation $hotel)
    {
        $this->hotel = $hotel;
        $this->with(['hotel' => $hotel]);
    }


    /**S
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking confirmation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    /**
 * Get the message content definition.
 */
    public function content(): Content
    {
        return new Content(
            view: 'emails.bookingapprovalemail',
        );
    }



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
