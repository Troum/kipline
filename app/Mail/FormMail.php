<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $company;
    public $product;
    public $count;
    public $environment;
    public $concentrate;
    public $viscosity;
    public $dielectricConstant;
    public $granuleSize;
    public $weightDensity;
    public $unitType;
    public $insideTemperature;
    public $outsideTemperature;
    public $atmosphere;
    public $pressure;
    public $secure;
    public $capacityType;
    public $height;
    public $diameter;
    public $minimal;
    public $maximum;
    public $pipeHeight;
    public $wallOffset;
    public $capacity;
    public $electricRequirement;
    public $outputSignalType;
    public $fillType;
    public $specialities;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$phone,$email,$company,$product,$count,$environment,$concentrate,$viscosity,$dielectricConstant,$granuleSize,$weightDensity,$unitType,$insideTemperature,$outsideTemperature,$atmosphere,
                                $pressure,$secure,$capacityType,$height,$diameter,$minimal,$maximum,$pipeHeight,$wallOffset,$capacity,$electricRequirement,$outputSignalType,$fillType,$specialities )
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->company = $company;
        $this->product = $product;
        $this->count = $count;
        $this->environment = $environment;
        $this->concentrate = $concentrate;
        $this->viscosity = $viscosity;
        $this->dielectricConstant = $dielectricConstant;
        $this->granuleSize = $granuleSize;
        $this->weightDensity = $weightDensity;
        $this->unitType = $unitType;
        $this->insideTemperature = $insideTemperature;
        $this->outsideTemperature = $outsideTemperature;
        $this->atmosphere = $atmosphere;
        $this->pressure = $pressure;
        $this->secure = $secure;
        $this->capacityType = $capacityType;
        $this->height = $height;
        $this->diameter = $diameter;
        $this->minimal = $minimal;
        $this->maximum = $maximum;
        $this->pipeHeight = $pipeHeight;
        $this->wallOffset = $wallOffset;
        $this->capacity = $capacity;
        $this->electricRequirement = $electricRequirement;
        $this->outputSignalType = $outputSignalType;
        $this->fillType = $fillType;
        $this->specialities = $specialities;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.form-email')->subject('Анкета');
    }
}
