<?php

namespace Riley\AdminApprover\Traits;

trait RequiresAdminApproval
{
    public function isApproved(): bool
    {
        return !is_null($this->admin_approved_at);
    }

    public function approve()
    {
        $this->update(['admin_approved_at' => now()]);
    }

    public function unapprove()
    {
        $this->update(['admin_approved_at' => null]);
    }
}
