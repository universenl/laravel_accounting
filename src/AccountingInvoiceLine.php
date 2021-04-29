<?php
namespace Dvb\Accounting;

class AccountingInvoiceLine {
    protected float $amount = 0;
    protected string $unit = 'piece';
    protected string $code = '';
    protected string $description = '';
    protected float $price = 0;
    protected string $tax_code = '';
    protected string $ledger_code = '';

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return AccountingInvoiceLine
     */
    public function setAmount(float $amount): AccountingInvoiceLine
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     * @return AccountingInvoiceLine
     */
    public function setUnit(string $unit): AccountingInvoiceLine
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return AccountingInvoiceLine
     */
    public function setCode(string $code): AccountingInvoiceLine
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return AccountingInvoiceLine
     */
    public function setDescription(string $description): AccountingInvoiceLine
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return AccountingInvoiceLine
     */
    public function setPrice(float $price): AccountingInvoiceLine
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxCode(): string
    {
        return $this->tax_code;
    }

    /**
     * @param string $tax_code
     * @return AccountingInvoiceLine
     */
    public function setTaxCode(string $tax_code): AccountingInvoiceLine
    {
        $this->tax_code = $tax_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getLedgerCode(): string
    {
        return $this->ledger_code;
    }

    /**
     * @param string $ledger_code
     * @return AccountingInvoiceLine
     */
    public function setLedgerCode(string $ledger_code): AccountingInvoiceLine
    {
        $this->ledger_code = $ledger_code;
        return $this;
    }
}
