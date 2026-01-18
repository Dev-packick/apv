@extends('layouts.client')
@section('content')
		<main id="content" class="site-main post-518 envato_tk_templates type-envato_tk_templates status-publish has-post-thumbnail hentry">
			<div class="page-content">
				<div data-elementor-type="wp-post" data-elementor-id="518" class="elementor elementor-518" data-elementor-post-type="envato_tk_templates">
					<section class="elementor-section elementor-top-section elementor-element elementor-element-517bea4 elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="517bea4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" style="background-image: url(client/assets/img/img1.jpg);">
						<div class="elementor-background-overlay"></div>
						<div class="elementor-container elementor-column-gap-no">
							<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b3e1c17" data-id="b3e1c17" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
								<div class="elementor-widget-wrap elementor-element-populated">
									<div class="elementor-element elementor-element-17b967e elementor-widget elementor-widget-heading" data-id="17b967e" data-element_type="widget" data-widget_type="heading.default">
										<div class="elementor-widget-container">
											<style>
												.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}
											</style>
											<h1 class="elementor-heading-title elementor-size-default">Nos projets</h1>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
                    <!-- DEBUT SECTION PROJETS-->
					<section class="elementor-section elementor-top-section elementor-element elementor-element-ca08284 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ca08284" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6c94c40" data-id="6c94c40" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">

                                    {{-- Tri par date décroissante puis découpage par 3 --}}
                                    @foreach($commerce->sortByDesc('created_at')->chunk(3) as $chunk)
                                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-f821300 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f821300" data-element_type="section" style="margin-bottom: 30px;">
                                            <div class="elementor-container elementor-column-gap-no" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px;">

                                                @foreach($chunk as $item)
                                                    <div class="elementor-column elementor-col-33 elementor-inner-column" style="flex: 1; min-width: 300px; max-width: 360px;">

                                                        <div class="project-card" style="background: #ffffff; border: 1px solid #ccc; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 100%; display: flex; flex-direction: column;">

                                                            <div class="elementor-widget-image">
                                                                <img src="{{ asset('/articlesImages/' . $item->image)}}" alt="{{ $item->nom_produit }}" style="width: 100%; height: 230px; object-fit: cover;">
                                                            </div>

                                                            <div style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                                                                <h5 style="margin-bottom: 12px;">
                                                                    <a href="{{route('blogdetails', $item)}}" style="text-decoration: none; color: #1b4d3e; font-weight: 700; font-size: 17px; display: block; height: 24px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                                        {{ $item->nom_produit }}
                                                                    </a>
                                                                </h5>

                                                                <p style="font-size: 14px; color: #555; line-height: 1.5; margin-bottom: 20px; height: 42px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                                    {{ $item->descript_produit }}
                                                                </p>

                                                                <div style="margin-bottom: 20px;">
                                                                    <div style="display: flex; justify-content: space-between; font-size: 12px; font-weight: bold; color: #1b4d3e; margin-bottom: 6px;">
                                                                        <span>Progression</span>
                                                                        <span>100%</span>
                                                                    </div>
                                                                    <div style="background-color: #e0e0e0; height: 10px; border-radius: 10px; width: 100%; border: 1px solid #ddd;">
                                                                        <div style="background-color: #1b4d3e; height: 100%; width: 100%; border-radius: 10px;"></div>
                                                                    </div>
                                                                </div>

                                                                <div style="margin-top: auto; padding-top: 15px; border-top: 1px dashed #ccc; font-size: 13px; color: #333;">
                                                                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                                                        <span style="margin-right: 5px;">📅</span> <strong>Date :</strong> {{ $item->created_at->translatedFormat('d M Y') }}
                                                                    </div>
                                                                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                                                                        <span style="margin-right: 5px;">📍</span> <strong>Lieu :</strong> {{ $item->prix_produit }}
                                                                    </div>

                                                                    <a href="{{route('blogdetails', $item)}}" style="display: block; text-align: center; background-color: #1b4d3e; color: #fff; padding: 10px; border-radius: 12px; text-decoration: none; font-weight: bold; font-size: 13px; transition: 0.3s;">
                                                                        LIRE LA SUITE
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach

                                            </div>
                                        </section>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- FIN SECTION PROJETS-->
				</div>
				<div class="post-tags"></div>
			</div>
		</main>
@endsection
