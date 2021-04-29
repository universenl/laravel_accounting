<?php
namespace Dvb\Accounting;

interface AccountingProvider {
    /**
     * @return AccountingRelation[]
     */
    public function getRelations(): array;

    /**
     * @return AccountingLedger[]
     */
    public function getLedgers(): array;

    /**
     * @param MutationFilter|null $filter
     * @return AccountingMutation[]
     */
    public function getMutations(MutationFilter $filter = null): array;

    /**
     * @param AccountingInvoice $invoice
     * @return string   New invoice number
     */

    public function addInvoice(AccountingInvoice $invoice): string;

    /**
     * @param AccountingRelation $relation
     * @return AccountingRelation
     */
    public function addRelation(AccountingRelation $relation): AccountingRelation;

    /**
     * @param AccountingRelation $relation
     * @return AccountingRelation
     */
    public function updateRelation(AccountingRelation $relation): AccountingRelation;
}
