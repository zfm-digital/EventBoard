<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[Fillable(['name', 'slug'])]
class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;

    /**
     * @return MorphToMany<Organization, $this>
     */
    public function organizations(): MorphToMany
    {
        return $this->morphedByMany(Organization::class, 'taggable');
    }

    /**
     * @return MorphToMany<Event, $this>
     */
    public function events(): MorphToMany
    {
        return $this->morphedByMany(Event::class, 'taggable');
    }

    /**
     * @return MorphToMany<User, $this>
     */
    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'taggable');
    }
}
