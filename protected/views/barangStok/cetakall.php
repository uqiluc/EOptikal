<section class="col-xs-12">

<div class="box box-solid">
<div class="box-body">
<div class="row">

	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'summaryText'=>'',
		'itemView'=>'_index',
	)); ?>

</div>
</div>
</div>
</section>