<?php

declare(strict_types=1);

namespace Liberu\CRM\MarketingResources\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Liberu\Foundation\Organizations\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** @property int $team_id @property string $kind @property string $status */
final class MarketingResource extends Model
{
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    protected $table = 'crm_marketing_resources';

    protected $guarded = [];

    protected function casts(): array
    {
        return ['metadata' => 'array'];
    }

    public function events(): HasMany
    {
        return $this->hasMany(MarketingResourceEvent::class, 'resource_id');
    }
}
