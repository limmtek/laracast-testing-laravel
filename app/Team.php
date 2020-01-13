<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'size'];

    /**
     * @param $users
     * @throws \Exception
     */
    public function add($users)
    {
        $this->guardsAgainstTooManyMembers($this->extractNewUsersCount($users));

        $method = $users instanceof User ? 'save' : 'saveMany';

        $this->members()->$method($users);
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }

    public function count()
    {
        return $this->members()->count();
    }

    public function maximumSize()
    {
        return $this->size;
    }


    public function remove($users = null)
    {
        if ($users instanceof User) {
            return $users->leaveTeam();
        }

        return $this->removeMany($users);
    }

    public function removeMany($users)
    {
        return $this->members()
                    ->whereIn('id', $users->pluck('id'))
                    ->update(['team_id' => null]);
    }

    public function restart()
    {
        $this->members()->update(['team_id' => null]);
    }

    /**
     * @throws \Exception
     */
    private function guardsAgainstTooManyMembers($newUsersCount)
    {
        $newTeamCount = $this->count() + $newUsersCount;

        if ($newTeamCount > $this->maximumSize()) {
            throw new \Exception;
        }
    }

    private function extractNewUsersCount($users)
    {
        return ($users instanceof User) ? 1 : count($users);
    }
}
