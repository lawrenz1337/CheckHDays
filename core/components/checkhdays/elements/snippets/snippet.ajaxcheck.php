<?php
if (!$CheckHDays = $modx->getService('checkhdays', 'CheckHDays', $modx->getOption('checkhdays_core_path', null, $modx->getOption('core_path') . 'components/checkhdays/') . 'model/checkhdays/', $scriptProperties)) {
    return 'Could not load CheckHDays class!';
}
$date_corr = explode('-', $_POST['send']);
if (!checkdate($date_corr[1], $date_corr[2], $date_corr[0])) {
    echo "Некорректный ввод";
    die;
}
// Build query
$c = $modx->newQuery('CheckHDaysItem');
$c->where(array('active'=>true));
$items = $modx->getIterator('CheckHDaysItem', $c);
$holidays = array();
foreach ($items as $item) {
    $holidays[] = $item->toArray();
}
$time_test2 = strtotime($_POST['send']);
$date = getdate($time_test2);
$date['week_number'] = ceil(($date['mday'] - $date['wday'] + 7) / 7); //определение номера недели и добавление ключа в массив $date

$count = 0;
foreach ($holidays as $holiday) {//перебор массива праздников и сравнение с текущей датой
    if ($date['mon'] == $holiday['month']) {
        if ($date['mday'] == $holiday['from'] && $holiday['week'] == false && $holiday['day'] == false) {//случай с точно заданной датой
            $count++;
        }
        if ($date['mday'] >= $holiday['from'] && $date['mday'] <= $holiday['to'] && $holiday['week'] == false && $holiday['day'] == false) {//случай с заданным промежутком дней
            $count++;
        }
        if ($holiday['from'] == false && $holiday['to'] == false) {//случай со стационарными днями
            if ($holiday['week'] == -1) {// -1 проверка для последней недели
                $number = cal_days_in_month(CAL_GREGORIAN, $date['mon'], $date['year']);
                $date_temp = $date['year'] . '-' . $date['mon'] . '-' . $number; //берем дату последнего дня месяца и с помощью неё получаем максимальное количество недель в месяце
                $date_exception = explode("-", $date_temp);
                if ($date['wday'] == $holiday['day'] && $date['week_number'] == ceil((cal_days_in_month(CAL_GREGORIAN, $date['mon'], $date['year']) - date("w", mktime(0, 0, 0, $date_exception[1], $date_exception[2], $date_exception[0])) + 7) / 7)) {//сравнение текущей недели и максимальной недели месяца
                    $count++;
                }
            }
            if ($date['wday'] == $holiday['day'] && $date['week_number'] == $holiday['week']) { //обычный случай с определенной неделей
                $count++;
            }
        }
    } else {
        continue;
    }
}
if ($count > 0) {
    echo 'Поздравляю, сегодня праздник! ';
} else {
    echo 'Сегодня нет праздника :(';
}
die;