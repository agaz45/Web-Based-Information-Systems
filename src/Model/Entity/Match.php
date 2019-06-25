<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity
 *
 * @property int $match_id
 * @property \Cake\I18n\FrozenTime $start_time
 * @property \Cake\I18n\FrozenTime $end_time
 * @property string $team1
 * @property string $team2
 * @property string $result
 * @property float $payout1
 * @property float $payout2
 */
class Match extends Entity
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
        'start_time' => true,
        'end_time' => true,
        'team1' => true,
        'team2' => true,
        'result' => true,
        'payout1' => true,
        'payout2' => true
    ];
}
