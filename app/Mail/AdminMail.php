<?php

namespace App\Mail;

use PDF;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[Koohen - Your ultimate Lifestyle]: New order #'. $this->data->id ,
        );
    }


    public function build(){
        $pdf = $this->generateInvoicePDF($this->data->id);
        return $this->view('admin.email.adminmail',['order' => $this->data])
        ->attachData($pdf, 'invoice.pdf', [
            'mime' => 'application/pdf',
        ]);
    }

    public function generateInvoicePDF($id)
    {
       // ini_set('max_execution_time',3600);
        $order = Order::where('id', $id)->first();

        if (!$order) {
            return 'Order not found';
        }

        $pdf= PDF::loadView('invoice',['order'=>$order],[],
            [
                'mode'                 => '',
                'format'               => 'A5',
                'default_font_size'    => '10',
                'margin_left'          => 8,
                'margin_right'         => 8,
                'margin_top'           => 10,
                'margin_bottom'        => 10,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Koohen',
                'author'               => 'koohen Ecommerce',
                'watermark'            => 'KOOHEN',
                'show_watermark'       => false,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.1,
                'custom_font_dir'      => '',
                'custom_font_data'     => [],
                'auto_language_detection'  => false,
                'temp_dir'               => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
                'pdfa'          => false,
                'pdfaauto'      => false,
            ]
        );

        $mpdf = $pdf->Output('', 'S');

        return $mpdf;
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.email.adminmail',
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
