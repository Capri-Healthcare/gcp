<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $meta_title; ?></title>
	<link rel="stylesheet" href="<?php echo URL_ADMIN.'public/css/inv-pdf.css'; ?>" type="text/css">
</head>
<body>
	<div class="inv-template inv-template-1 ps-template">
		<div class="company pl-30 pr-30">
			<table>
				<tbody>
					<tr>
						<td class="info">
							<div class="logo"><img src="<?php echo URL.'public/uploads/'.$common['logo']; ?>" alt="logo"></div>
							<div class="name"><?php echo 'Dr. '.$result['doctor']; ?></div>
							<div class="text"><?php echo $common['address']['address1'].', '.$common['address']['address2'].', '.$common['address']['city'].', '.$common['address']['country'].' - '.$common['address']['postal']; ?></div>
							<div class="text">Phone Number : <?php echo $common['phone']; ?></div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="strip"><p>Prescription</p></div>
		<div class="meta pl-30 pr-30">
			<table>
				<tbody>
					<tr class="ps-patient">
						<td class="v-aling-bottom">
							<div class="name">Name : <?php echo $result['patient']; ?></div>
						</td>
						<td class="v-aling-bottom text-right">
							<div class="date text-right">Date : <?php echo date_format(date_create($result['date_of_joining']), $common['date_format']); ?></div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="item pl-30 pr-30">
			<table cellspacing="0">
				<thead>
                <tr>
                    <th style="width: 25%;">Drug Name</th>
                    <!--th>Generic</th-->
                    <th style="width: 15%;">Frequency</th>
                    <!--th style="width: 13%;">Duration</th-->
                    <th style="width: 25%;">Instruction</th>
                    <th style="width: 10%;">Start date</th>
                    <th style="width: 10%;">End date</th>
                    <th style="width: 15%;">Eye</th>
                </tr>
				</thead>
				<tbody>
                <?php foreach ($result['prescription'] as $key => $value) { ?>

                    <tr>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['duration']; ?></td>
                        <td><?php echo $value['instruction']; ?></td>
                        <td><?php echo date_format(date_create($value['start_date']),'d-m-Y'); ?></td>
                        <td><?php echo date_format(date_create($value['end_date']),'d-m-Y'); ?></td>
                        <td><?php echo constant('PRESCRIPTION_DROP_DOWNS')['PRESCRIPTION_EYE'][$value['eye']]; ?></td>
                    </tr>
                <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>