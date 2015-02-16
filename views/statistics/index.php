<?php
/* @var $this yii\web\View */

$this->title = 'Статистика';
?>

<div class="statistics">
    <div class="topButtons">
        <div class="line">
            <a class="btn active">За все время</a>
            <a class="btn">2015</a>
        </div>
        <div class="line">
            <a class="btn active">Голов за игру</a>
            <a class="btn">Процент успеха</a>
        </div>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Место</th>
                    <th>Имя</th>
                    <th>Всего игр</th>
                    <th>Всего голов</th>
                    <th>Голов за игру</th>
                </tr>
            </thead>
            <tbody>
                <?php $num=0; foreach($users as $user){ $num++; ?>
                    <tr>
                        <td><?= $num?>.</td>
                        <td><?= $user['name'] .' '. $user['surname']?></td>
                        <td><?= $user['gameCount']?></td>
                        <td><?= $user['goalCount']?></td>
                        <td><?= ($user['gameCount']!==0)? round($user['goalCount']/$user['gameCount'], 2):'n/a';?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>