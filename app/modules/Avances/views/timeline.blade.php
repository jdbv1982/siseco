<div class="col-xs-8 col-xs-offset-2">
<h2>Avances</h2>
<p><strong>Numero:</strong>{{$obra->numeroobra}}</p>
<p><strong>Nombre:</strong>{{$obra->nombreobra}}</p>



<div id="timelineContainer" class="timelineContainer">
	<div class="timelineToggle">
		<p><a class="expandAll">+ expandir todo</a></p>
	</div>
@foreach ($time as $t)
	<br class="clear">
	<div class="timelineMajor">
		<h2 class="timelineMajorMarker"><span>{{$t->afisico}}</span></h2>
		<dl class="timelineMinor">
			<dt><a>Avance Fisico: {{$t->afisico}}</a><br>
				<a>Avance Financiero: {{$t->afinanciero}}</a>
			</dt>
			<dd class="timelineEvent" style="display:none;">
					<p>{{$t->observaciones}}</p>
				<div class="media gallery">
							<a href="{{ URL::to($t->foto1) }}" rel="prettyPhoto[gallery1]" title="{{$obra->nombreobra}}">
								<img src="{{ URL::to($t->foto1) }}" width="200" height="200" alt="{{$obra->numeroobra}} Avance Fisico: {{$t->afisico}} - Avance Financiero:{{$t->afinanciero}}" />
							</a>
							<a href="{{ URL::to($t->foto2) }}" rel="prettyPhoto[gallery1]" title="{{$obra->nombreobra}}">
								<img src="{{ URL::to($t->foto2) }}" width="200" height="200" alt="{{$obra->numeroobra}} Avance Fisico: {{$t->afisico}} - Avance Financiero:{{$t->afinanciero}}" />
							</a>
							<a href="{{ URL::to($t->foto3) }}" rel="prettyPhoto[gallery1]" title="{{$obra->nombreobra}}">
								<img src="{{ URL::to($t->foto3) }}" width="200" height="200" alt="{{$obra->numeroobra}} Avance Fisico: {{$t->afisico}} - Avance Financiero:{{$t->afinanciero}}" />
							</a>
				</div>
				</dd>
			</dl>
		</div>
@endforeach
	</div>
</div>
