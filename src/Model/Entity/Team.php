<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property string $team_name
 * @property string $game
 * @property string $division
 * @property string $location
 * @property int $win
 * @property int $lose
 * @property int $tie
 * @property int $world_rank
 */
class Team extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'team_name' => true,
        'game' => true,
        'division' => true,
        'location' => true,
        'win' => true,
        'lose' => true,
        'tie' => true,
        'world_rank' => true
    ];
}
