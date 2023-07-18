<?php
//$openaccess = 1;

$requiredUserLevel = 3;
?>

<!-- 

Queries

//REGISTRATIONS
SELECT COUNT(`id`) FROM `symposium` WHERE `partial_registration` = '0';

//REGISTRATIONS PER CATEGORY
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4');
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5');


//REDUCE SYMPOSIUM INCOME BY 20% FOR THIS NUMBER WHO HAVE PROFESSIONAL REGISTRATIONS
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `professionalMember` = '1');  //DOCTORS WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `professionalMember` = '1');  //TRAINEES WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `professionalMember` = '1');  //NENDO WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `professionalMember` = '1');  //N WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `professionalMember` = '1');  //M STUDENTS WITH REDUCTION

//REDUCE SYMPOSIUM INCOME BY 20% FOR LONG TERM GIEQS PRO MEMBERS
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `longTermProMemberDiscount` = '1'); //DOCTORS WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `longTermProMemberDiscount` = '1'); //TRAINEES WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `longTermProMemberDiscount` = '1'); //NENDO WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `longTermProMemberDiscount` = '1'); //N WITH REDUCTION
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `longTermProMemberDiscount` = '1'); //M STUDENTS WITH REDUCTION

//ALSO FOR GIEQS PRO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '1' AND `includeGIEQsPro` = '1'); // DOCTORS WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '2' AND `includeGIEQsPro` = '1'); // TRAINEES WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '3' AND `includeGIEQsPro` = '1'); // NENDO WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '4' AND `includeGIEQsPro` = '1'); // N WITH GIEQS PRO TOO
SELECT COUNT(`id`) FROM `symposium` WHERE (`partial_registration` = '0' AND `registrationType` = '5' AND `includeGIEQsPro` = '1'); // M STUDENTS WITH GIEQS PRO TOO

SELECT COUNT(`id`) FROM `symposium` WHERE `partial_registration` = '1'; // INCOMPLETE REGISTRATIONS





 -->
<style>
 #registrations th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>

<div id="registrations">
 <p>Early-bird GIEQs IV Registrations (not including group registrations)</p>

<table>
    <tbody>
        <tr>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <p>Total Registrations</p>
            </td>
            <td>
                <?php echo $symposium_manager->count_all_registrations(); ?>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <th>
                <p>Doctor</p>
            </th>
            <th>
                <p>Trainee</p>
            </th>
            <th>
                <p>Nurse Endo</p>
            </th>
            <th>
                <p>Nursing</p>
            </th>
            <th>
                <p>Medical Student</p>
            </th>
            <td>
                Overall
</td>
        </tr>
        <tr>
            <td>
                <p>Number</p>
            </td>
            <td>
            <?php echo $count1 = $symposium_manager->count_specific_registrations('1'); ?>

            </td>
            <td>
            <?php echo $count2 = $symposium_manager->count_specific_registrations('2'); ?>

            </td>
            <td>
            <?php echo $count3 = $symposium_manager->count_specific_registrations('3'); ?>

            </td>
            <td>
            <?php echo $count4 = $symposium_manager->count_specific_registrations('4'); ?>

            </td>
            <td>
            <?php echo $count5 = $symposium_manager->count_specific_registrations('5'); ?>

            </td>
            <td>
            <?php echo $count_total = $symposium_manager->count_all_registrations(); ?>

</td>
        </tr>
        <tr>
            <td>
                <p>+GIEQs Online (n, %)</p>
            </td>
            <td>
            
            <?php echo $count1_2 = $symposium_manager->count_specific_registrations_withonline('1'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_withonline('1')) / intval($symposium_manager->count_specific_registrations('1')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count2_2 = $symposium_manager->count_specific_registrations_withonline('2'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_withonline('2')) / intval($symposium_manager->count_specific_registrations('2')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count3_2 =$symposium_manager->count_specific_registrations_withonline('3'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_withonline('3')) / intval($symposium_manager->count_specific_registrations('3')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count4_2 =$symposium_manager->count_specific_registrations_withonline('4'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_withonline('4')) / intval($symposium_manager->count_specific_registrations('4')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count5_2 =$symposium_manager->count_specific_registrations_withonline('5'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_withonline('5')) / intval($symposium_manager->count_specific_registrations('5')) * 100), 1, '.', '');?>%)

            </td>
            <td>

            <?php echo $total_gieqs_online = intval($count1_2)+intval($count2_2)+intval($count3_2)+intval($count4_2)+intval($count5_2);?>

            </td>
        </tr>
        <tr>
            <td>
                <p>with long-term GIEQs Pro Discount</p>
            </td>
            <td>
            <?php echo $count1_3 = $symposium_manager->count_specific_registrations_with_longservice_discount('1'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_longservice_discount('1')) / intval($symposium_manager->count_specific_registrations('1')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count2_3 = $symposium_manager->count_specific_registrations_with_longservice_discount('2'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_longservice_discount('2')) / intval($symposium_manager->count_specific_registrations('2')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count3_3 = $symposium_manager->count_specific_registrations_with_longservice_discount('3'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_longservice_discount('3')) / intval($symposium_manager->count_specific_registrations('3')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count4_3 = $symposium_manager->count_specific_registrations_with_longservice_discount('4'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_longservice_discount('4')) / intval($symposium_manager->count_specific_registrations('4')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count5_3 = $symposium_manager->count_specific_registrations_with_longservice_discount('5'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_longservice_discount('5')) / intval($symposium_manager->count_specific_registrations('5')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $total_longservice_discount = intval($count1_3)+intval($count2_3)+intval($count3_3)+intval($count4_3)+intval($count5_3);?>

            </td>
        </tr>
        <tr>
            <td>
                <p>with Professional Registration Discount</p>
            </td>
            <td>
            <?php echo $count1_4 = $symposium_manager->count_specific_registrations_with_professional_discount('1'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_professional_discount('1')) / intval($symposium_manager->count_specific_registrations('1')) * 100), 1, '.', '');?>%)

            
            </td>
            <td>
            <?php echo $count2_4 = $symposium_manager->count_specific_registrations_with_professional_discount('2'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_professional_discount('2')) / intval($symposium_manager->count_specific_registrations('2')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count3_4 = $symposium_manager->count_specific_registrations_with_professional_discount('3'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_professional_discount('3')) / intval($symposium_manager->count_specific_registrations('3')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count4_4 = $symposium_manager->count_specific_registrations_with_professional_discount('4'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_professional_discount('4')) / intval($symposium_manager->count_specific_registrations('4')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $count5_4 = $symposium_manager->count_specific_registrations_with_professional_discount('5'); ?> (<?php echo number_format((float)(intval($symposium_manager->count_specific_registrations_with_professional_discount('5')) / intval($symposium_manager->count_specific_registrations('5')) * 100), 1, '.', '');?>%)

            </td>
            <td>
            <?php echo $total_professional_discount = intval($count1_4)+intval($count2_4)+intval($count3_4)+intval($count4_4)+intval($count5_4);?>

            </td>
        </tr>
        <tr>
            <td>
                <p>Expected income</p>
            </td>
            <td>
                <?php 
                
                //cost full reg
                $total_column_1 = 0;
                $cost1=$symposium_manager->calculateCost(true, '1', '0', '0');
                $cost2=$symposium_manager->calculateCost(true, '1', '0', '1');
                $discounts = max(array($count1_3, $count1_4));

                $total_column_1 = ((intval($cost1['cost']) * ($count1-$discounts)) + ((intval($cost1['cost']) *  0.8) * ($discounts)) + (intval($cost1['cost']) * $count1_2));
                echo '&euro;' . $total_column_1;
                ?>
            </td>
            <td>
            <?php 
                
                //cost full reg
                $cost1=0; $cost2=0; $discounts=null;
                $total_column_2 = 0;
                $cost1=$symposium_manager->calculateCost(true, '2', '0', '0');
                $cost2=$symposium_manager->calculateCost(true, '2', '0', '1');
                $discounts = max(array($count2_3, $count2_4));

                $total_column_2 = ((intval($cost1['cost']) * ($count2-$discounts)) + ((intval($cost1['cost']) *  0.8) * ($discounts)) + (intval($cost1['cost']) * $count2_2));
                echo '&euro;' . $total_column_2;
                ?>
            </td>
            <td>
            <?php 
                
                //cost full reg
                $cost1=0; $cost2=0; $discounts=null;
                $total_column_3 = 0;
                $cost1=$symposium_manager->calculateCost(true, '3', '0', '0');
                $cost2=$symposium_manager->calculateCost(true, '3', '0', '1');
                $discounts = max(array($count3_3, $count3_4));

                $total_column_3 = ((intval($cost1['cost']) * ($count3-$discounts)) + ((intval($cost1['cost']) *  0.8) * ($discounts)) + (intval($cost1['cost']) * $count3_2));
                echo '&euro;' . $total_column_3;
                ?>
            </td>
            <td>
            <?php 
                
                //cost full reg
                $cost1=0; $cost2=0; $discounts=null;
                $total_column_4 = 0;
                $cost1=$symposium_manager->calculateCost(true, '4', '0', '0');
                $cost2=$symposium_manager->calculateCost(true, '4', '0', '1');
                $discounts = max(array($count4_3, $count4_4));

                $total_column_4 = ((intval($cost1['cost']) * ($count4-$discounts)) + ((intval($cost1['cost']) *  0.8) * ($discounts)) + (intval($cost1['cost']) * $count4_2));
                echo '&euro;' . $total_column_4;
                ?>
            </td>
            <td>
            <?php 
                
                //cost full reg
                $cost1=0; $cost2=0; $discounts=null;
                $total_column_5 = 0;
                $cost1=$symposium_manager->calculateCost(true, '5', '0', '0');
                $cost2=$symposium_manager->calculateCost(true, '5', '0', '1');
                $discounts = max(array($count5_3, $count5_4));

                $total_column_5 = ((intval($cost1['cost']) * ($count5-$discounts)) + ((intval($cost1['cost']) *  0.8) * ($discounts)) + (intval($cost1['cost']) * $count5_2));
                echo '&euro;' . $total_column_5;
                ?>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <p>Total expected income</p>
            </td>
            <td>
                <?php echo $total_income = $total_column_1 + $total_column_2 + $total_column_3 + $total_column_4 + $total_column_5;?> &euro;
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <p>Incomplete registrations</p>
            </td>
            <td>
                <?php echo $incompleteRegistrations = $symposium_manager->count_all_incomplete_registrations(); ?>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
       
    </tbody>
</table>

</div>


