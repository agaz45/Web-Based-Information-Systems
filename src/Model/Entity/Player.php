<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Player Entity
 *
 * @property string $player_id
 * @property string $game
 * @property string $player_name
 * @property string $team_name
 * @property string $location
 * @property string $role
 *
 * @property \App\Model\Entity\Player $player
 */
class Player extends Entity
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
        'player_id' => true,
        'game' => true,
        'player_name' => true,
        'team_name' => true,
        'location' => true,
        'role' => true,
        'player' => true
    ];
}
