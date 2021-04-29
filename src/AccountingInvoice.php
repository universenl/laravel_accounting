<?php
namespace Dvb\Accounting;

use DateTime;

class AccountingInvoice {
    protected string $invoice_number = '';
    protected string $relation_code = '';
    protected ?DateTime $date = null;
    protected int $payment_term = 0;
    protected string $description = '';
    protected array $lines = [];

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoice_number;
    }

    /**
     * @param string $invoice_number
     * @return AccountingInvoice
     */
    public function setInvoiceNumber(string $invoice_number): AccountingInvoice
    {
        $this->invoice_number = $invoice_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getRelationCode(): string
    {
        return $this->relation_code;
    }

    /**
     * @param string $relation_code
     * @return AccountingInvoice
     */
    public function setRelationCode(string $relation_code): AccountingInvoice
    {
        $this->relation_code = $relation_code;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     * @return AccountingInvoice
     */
    public function setDate(?DateTime $date): AccountingInvoice
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentTerm(): int
    {
        return $this->payment_term;
    }

    /**
     * @param int $payment_term
     * @return AccountingInvoice
     * @throws AccountingException
     */
    public function setPaymentTerm(int $payment_term): AccountingInvoice
    {
        if ($payment_term < 0) {
            throw new AccountingException("Payment term must be a positive integer");
        }

        $this->payment_term = $payment_term;
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
     * @return AccountingInvoice
     */
    public function setDescription(string $description): AccountingInvoice
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return AccountingInvoiceLine[]
     */
    public function getLines(): array
    {
        if (empty($this->lines)) {
            return [];
        }

        return $this->lines;
    }

    /**
     * @param AccountingInvoiceLine $line
     * @return AccountingInvoice
     */
    public function addLine(AccountingInvoiceLine $line): AccountingInvoice {
        if (empty($this->lines)) {
            $this->lines = [];
        }

        $this->lines[] = $line;

        return $this;
    }

    /**
     * @param AccountingInvoiceLine[] $lines
     * @return AccountingInvoice
     * @throws AccountingException
     */
    public function setLines(array $lines): AccountingInvoice
    {
        foreach($lines as $line) {
            if (!($line instanceof AccountingInvoiceLine)) {
                throw new AccountingException('All invoice lines must be instance of ' . AccountingInvoiceLine::class);
            }
        }

        $this->lines = $lines;
        return $this;
    }
}
