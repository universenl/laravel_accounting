<?php
namespace Dvb\Accounting;

use DateTime;

class AccountingMutation {
    protected int $number = 0;
    protected string $kind = '';
    protected ?DateTime $date = null;
    protected string $ledger_code = '';
    protected ?string $relation_code = null;
    protected ?string $invoice_number = null;
    protected string $description = '';
    protected ?int $payment_term = null;
    protected array $lines = [];

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return AccountingMutation
     */
    public function setNumber(int $number): AccountingMutation
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     * @return AccountingMutation
     */
    public function setKind(string $kind): AccountingMutation
    {
        $this->kind = $kind;
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
     * @return AccountingMutation
     */
    public function setDate(?DateTime $date): AccountingMutation
    {
        $this->date = $date;
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
     * @return AccountingMutation
     */
    public function setLedgerCode(string $ledger_code): AccountingMutation
    {
        $this->ledger_code = $ledger_code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRelationCode(): ?string
    {
        return $this->relation_code;
    }

    /**
     * @param string|null $relation_code
     * @return AccountingMutation
     */
    public function setRelationCode(?string $relation_code): AccountingMutation
    {
        $this->relation_code = $relation_code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoice_number;
    }

    /**
     * @param string|null $invoice_number
     * @return AccountingMutation
     */
    public function setInvoiceNumber(?string $invoice_number): AccountingMutation
    {
        $this->invoice_number = $invoice_number;
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
     * @return AccountingMutation
     */
    public function setDescription(string $description): AccountingMutation
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentTerm(): ?int
    {
        return $this->payment_term;
    }

    /**
     * @param int|null $payment_term
     * @return AccountingMutation
     */
    public function setPaymentTerm(?int $payment_term): AccountingMutation
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * @return AccountingMutationLine[]
     */
    public function getLines(): array
    {
        if (empty($this->lines)) {
            return [];
        }

        return $this->lines;
    }

    /**
     * @param AccountingMutationLine $line
     * @return AccountingMutation
     */
    public function addLine(AccountingMutationLine $line): AccountingMutation
    {
        if (empty($this->lines)) {
            $this->lines = [];
        }

        $this->lines[] = $line;

        return $this;
    }

    /**
     * @param AccountingMutationLine[] $lines
     * @return AccountingMutation
     * @throws AccountingException
     */
    public function setLines(array $lines): AccountingMutation
    {
        foreach ($lines as $line) {
            if (!($line instanceof AccountingMutationLine)) {
                throw new AccountingException('All mutation lines must be instance of ' . AccountingMutationLine::class);
            }
        }

        $this->lines = $lines;
        return $this;
    }

    /**
     * Get total line amount without vat
     * @return float
     */
    public function getAmountWithoutVat(): float {
        if (empty($this->lines)) {
            return 0;
        }

        return array_sum(array_map(fn($line) => $line->getAmount(), $this->lines));
    }

    /**
     * Get total line vat amount
     * @return float
     */
    public function getVatAmount(): float {
        if (empty($this->lines)) {
            return 0;
        }

        return array_sum(array_map(fn($line) => ($line->getAmount() / 100) * $line->getVatPercentage(), $this->lines));
    }
}
