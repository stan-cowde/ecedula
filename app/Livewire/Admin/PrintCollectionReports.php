<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;

class PrintCollectionReports extends Component
{
    public $dates;
    public $startDate;
    public $endDate;

    public function render()
    {
        return view('livewire.admin.print-collection-reports');
    }


    public function printReports()
    {
        try {


            if(! $this->startDate && ! $this->endDate) {
                return flash()->error('Please Select a data before printing');
            }

            $this->startDate = Carbon::parse($this->startDate)->startOfDay()->toDateTimeString();
            $this->endDate = Carbon::parse($this->endDate)->endOfDay()->toDateTimeString();

            $data = \DB::table('collection_and_deposit_reports')
                                    ->where('created_at', '>=', $this->startDate)
                                    ->where('created_at', '<=', $this->endDate)
                                    ->orderBy('created_at', 'asc')
                                    ->get()
                                    ->toArray();

            $totalAmount = \DB::table('collection_and_deposit_reports')
                                    ->where('created_at', '>=', $this->startDate)
                                    ->where('created_at', '<=', $this->endDate)
                                    ->sum('amount');

            if(empty($data)) {
                return flash()->error('There is no Information Between The Chosen Dates');
            }

            $html = view('components.printables.print-collection-reports', ['information' => $data, 'totalAmount' => $totalAmount])->render();

            /*
            *  1) This is the old way of printing the report
            *  2) This is error prone as well if its new to other pc
            *  3) This is not scalable as well
            */

             $pdf = \Spatie\Browsershot\Browsershot::html($html)
                    ->format('A4')
                    ->showBackground()
                    ->setOption('marginTop', 50)
                    ->pdf();


            flash()->success('Reports are being printed!');

            # Return the PDF as a stream download
            return response()->streamDownload(
                fn() => print($pdf),
                'collection_and_deposits-' . now() .'.pdf'
            );

        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            \Log::error($exception->getMessage());
        }
    }
}
