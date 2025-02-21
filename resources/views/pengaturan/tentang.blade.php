@extends('layouts.user')

@section('title', __('settings.about_app'))

@section('page-title')
<div class="col">
    <h2 class="page-title">
        {{ __('settings.about_app') }}
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="card">
		<div class="card-body">
			<div class="space-y-4">
				<div>
                    <h2 class="mb-3 text-center">Smart Finance</h2>
                    <div id="faq-1" class="accordion" role="tablist" aria-multiselectable="true">
						<div class="accordion-item">
                        	<div class="accordion-header" role="tab">
                          		<button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq-1-1">{{ __('settings.welcome_to') }} Smart Finance!</button>
                        	</div>
                        	<div id="faq-1-1" class="accordion-collapse collapse show" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
                              			<p>{{ __('settings.app_description') }}</p>
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                      	<div class="accordion-item">
                        	<div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-2">{{ __('settings.background') }}</button>
                        	</div>
                        	<div id="faq-1-2" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
                              			<p>{{ __('settings.background_description') }}</p>
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                      	<div class="accordion-item">
                        	<div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-3">{{ __('settings.main_features') }}</button>
                        	</div>
                        	<div id="faq-1-3" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
										<ul>
                      						<li>{{ __('settings.financial_records') }}</li>
											<li>{{ __('settings.general_records') }}</li>
											<li>{{ __('settings.budget') }}</li>
											<li>{{ __('settings.simulation') }} :
												<ul>
													<li>{{ __('settings.investment') }}</li>
													<li>{{ __('settings.loan') }}</li>
												</ul>
											</li>
											<li>{{ __('settings.portfolio') }}</li>
										</ul>	
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					  	<div class="accordion-item">
	                        <div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-4">{{ __('settings.technologies_used') }}</button>
							</div>
                        	<div id="faq-1-4" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
										<ul>
											<li>Backend : Laravel (PHP)</li>
											<li>Frontend :
												<ul>
													<li>Blade Template</li>
													<li>Bootstrap</li>
													<li>Javascript</li>
												</ul>
											</li>
											<li>Database : MySQL</li>
											<li>API :
												<ul>
													<li>GOAPI, {{ __('settings.stock_data_source') }}</li>
													<li>FreecurrencyAPI, {{ __('settings.currency_data_source') }}</li>
												</ul>
											</li>
										</ul>	
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					  	<div class="accordion-item">
	                        <div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-5">{{ __('settings.developer') }}</button>
                        	</div>
                        	<div id="faq-1-5" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
                              			<p>{{ __('settings.developer_description') }}</p>
										<p class="fw-bold">{{ __('settings.supervisor') }}</p>
										<ul>
											<li>Prof. Dr. I Made Sukarsa, S.T., M.T. - Fakultas Teknologi Informasi, Universitas Udayana</li>
											<li>Anak Agung Ketut Agung Cahyawan Wiranatha, S.T., M.T. - Fakultas Teknologi Informasi, Universitas Udayana</li>
										</ul>	
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  	document.addEventListener('DOMContentLoaded', function () {
		const spinner = document.getElementById("spinner");
		const pageContent = document.getElementById("page-content");
		const pageTitle = document.getElementById("page-title");
		
		window.addEventListener("load", function() {
    		spinner.style.display = "none";
    		pageContent.style.display = "block";
    		pageTitle.style.display = "block";
		});
  	});
</script>
@endsection