<?php
namespace PaymentRails;

/**
 * PaymentRails Batch module
 * PHP Version 5
 * Creates and manages batches of payments
 *
 * @package   PaymentRails
 *
 */
class Batch extends Base
{
    /**
     * @access protected
     * @var array registry of customer data
     */
    protected $_attributes = [
        "id" => "",
        "amount" => "",
        "completedAt" => "",
        "createdAt" => "",
        "currency" => "",
        "description" => "",
        "sentAt" => "",
        "status" => "",
        "totalPayments" => "",
        "updatedAt" => "",
    ];

    /**
     * Show all batches
     *
     * @param mixed $params
     * @param mixed $payments
     * @return Batch
     */
    public static function all()
    {
        return Configuration::gateway()->batch()->search([]);
    }

    /**
     * Search batches
     *
     * @param mixed $params
     * @param mixed $payments
     * @return Batch
     */
    public static function search($query)
    {
        return Configuration::gateway()->batch()->search($query);
    }

    /**
     * Get a specific batch
     *
     * @param mixed $batchId
     * @param mixed $payments
     * @return Batch
     */
    public static function find($batchId)
    {
        return Configuration::gateway()->batch()->find($batchId);
    }

    /**
     * Create a batch
     *
     * @param mixed $params
     * @param mixed $payments
     * @return Batch
     */
    public static function create($params, $payments = null)
    {
        return Configuration::gateway()->batch()->create($params, $payments);
    }

    /**
     * Update the batch
     *
     * @param string $batchId
     * @param mixed $params
     * @throws Exception\NotFound
     * @return boolean
     */
    public static function update($batchId, $params)
    {
        return Configuration::gateway()->batch()->update($batchId, $params);
    }

    /**
     * Delete a batch
     *
     * @param string $batchId
     * @throws Exception\NotFound
     * @return boolean
     */
    public static function delete($batchId)
    {
        return Configuration::gateway()->batch()->delete($batchId);
    }

    /**
     * Get all the payments for a batch
     * 
     * @param string $batchId
     * @throws Exception\NotFound
     * @return Interator Payments
     */
    public static function payments($batchId, $params = [])
    {
        return Configuration::gateway()->batch()->payments($batchId, $params);
    }

    /**
     * Add a single payment to a batch
     * 
     * @param string $batchId
     * @param mixed $payment
     * @throws Exception\NotFound
     * @return Payment
     */
    public static function createPayment($batchId, $payment)
    {
        return Configuration::gateway()->batch()->createPayment($batchId, $payment);
    }

    /**
     * Add a single payment to a batch
     * 
     * @param string $batchId
     * @param mixed $payment
     * @throws Exception\NotFound
     * @return Payment
     */
    public static function findPayment($batchId, $paymentId)
    {
        return Configuration::gateway()->batch()->findPayment($batchId, $paymentId);
    }

    /**
     * Add a update payment to a batch
     * 
     * @param string $batchId
     * @param string $paymentId
     * @param mixed $params
     * @throws Exception\NotFound
     * @return Payment
     */
    public static function updatePayment($batchId, $paymentId, $params)
    {
        return Configuration::gateway()->batch()->updatePayment($batchId, $paymentId, $params);
    }

    /**
     * Delete a payment from a batch
     * 
     * @param string $batchId
     * @param string $paymentId
     * @throws Exception\NotFound
     * @return Payment
     */
    public static function deletePayment($batchId, $paymentId)
    {
        return Configuration::gateway()->batch()->deletePayment($batchId, $paymentId);
    }

    /**
     * Generate the Quote for this batch
     *
     * @param string $batchId
     * @throws Exception\NotFound
     * @return boolean
     */
    public static function generateQuote($batchId) {
        return Configuration::gateway()->batch()->generateQuote($batchId);
    }

    /**
     * Get the batch summary
     *
     * @param string $batchId
     * @throws Exception\NotFound
     * @return BatchSummary
     */
    public static function summary($batchId) {
        return Configuration::gateway()->batch()->summary($batchId);
    }

    /**
     * Start the batch processing
     *
     * @param string $batchId
     * @throws Exception\NotFound
     * @return BatchSummary
     */
    public static function startProcessing($batchId) {
        return Configuration::gateway()->batch()->startProcessing($batchId);
    }

    /**
     * sets instance properties from an array of values
     *
     * @ignore
     * @access protected
     * @param array $transactionAttribs array of transaction data
     * @return void
     */
    protected function _initialize($attributes) {
        $fields = [
            "id",
            "amount",
            "completedAt",
            "createdAt",
            "currency",
            "description",
            "sentAt",
            "status",
            "totalPayments",
            "updatedAt",
        ];

        foreach ($fields as $field) {
            if (isset($attributes[$field])) {
                $this->_set($field, $attributes[$field]);
            }
        }
    }


   /**
     *  factory method: returns an instance of Transaction
     *  to the requesting method, with populated properties
     *
     * @ignore
     * @return Transaction
     */
    public static function factory($attributes)
    {
        $instance = new self();
        $instance->_initialize($attributes);
        return $instance;
    }
}

class_alias('PaymentRails\Batch', 'PaymentRails_Batch');
