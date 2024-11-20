<?php

namespace App\Core\Invoice\Domain\Exception;

use App\Core\Invoice\Domain\Exception\InvoiceException;

class CannotCreateInvoiceForInactiveUserException extends InvoiceException {}
