<?php
namespace Dvb\Accounting;

class AccountingLedger {
    protected int $id = 0;
    protected string $code = '';
    protected string $description = '';
    protected string $category = '';
    protected string $group = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AccountingLedger
     */
    public function setId(int $id): AccountingLedger
    {
        if ($id < 0) {
            return $this;
        }

        $this->id = $id;
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
     * @return AccountingLedger
     */
    public function setCode(string $code): AccountingLedger
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
     * @return AccountingLedger
     */
    public function setDescription(string $description): AccountingLedger
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return AccountingLedger
     */
    public function setCategory(string $category): AccountingLedger
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     * @return AccountingLedger
     */
    public function setGroup(string $group): AccountingLedger
    {
        $this->group = $group;
        return $this;
    }
}
