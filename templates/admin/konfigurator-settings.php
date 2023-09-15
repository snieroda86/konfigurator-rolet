<?php 
wp_enqueue_style('woocommerce_admin_styles');
wp_enqueue_script('wc-admin-meta-boxes');

$data = [

	array(
		'color' => 'red' ,
		'price' => 120 ,
		'material' => 'folia'
	),

	array(
		'color' => 'green' ,
		'price' => 140 ,
		'material' => 'cerata'
	),
	array(
		'color' => 'yellow' ,
		'price' => 110 ,
		'material' => 'styropian'
	),

];

 ?>

<div id="wrap-sn">

	<div class="wc-metaboxes-wrapper">
		<?php foreach ($data as $group) : ?>
		<div class="wc-metaboxes">
			<div class="wc-metabox closed" syyle="padding:15px;">
				
					<h3 class="">
						<div class="handlediv" title="Kliknij, aby przełączyć" aria-expanded="false"></div>
						<div class="tips sort"></div>
						<a href="#" class="remove_row delete">Usuń</a>
						<strong class="attribute_name"><?php echo $group['color']; ?></strong>
					</h3>
					<div class="wc-metabox-content">
						<table style="max-width: 400px;">
							<tr >
								<th style="background: #eee;border:1px solid silver;padding:5px 10px;">Price</th>
								<td style="border:1px solid silver;padding:5px 10px;"><?php echo $group['price']; ?></td>
							</tr>
							<tr>
								<th style="background: #eee;border:1px solid silver;padding:5px 10px;">Material</th>
								<td style="border:1px solid silver;padding:5px 10px;"><?php echo $group['material']; ?></td>
							</tr>
						</table>
					</div>
				
			</div>
		</div>	
		<?php endforeach; ?>
		
	</div>
	
	<?php wp_nonce_field('save_kgf_settings', 'kgf_nonce'); ?>
</div>