<div class="h-full w-full flex justify-between" wire:poll.900s>
    <article class="w-[calc(100-31.615)%] grid grid-cols-2 gap-x-40 4k:gap-x-80 mt-28 4k:mt-56">
        <!-- Titulo/ Logos -->
        <section class="flex flex-col items-end">
                <h1 class="text-9xl/[114px] 4k:text-[240px]/[228px] font-black text-white text-right mb-6 4k:mb-12">Cotação<br/> Agrícola</h1>
                <hr class="bg-green text-green h-3 4k:h-6 w-full rounded-r-full mb-14 4k:mb-28">
                <img src="{{ asset('site/assets/images/logos/Logo Plantagro.svg') }}" class="max-w-[393px] 4k:max-w-[786px] ml-auto mb-9 4k:mb-20  mr-16"/>
                <img src="{{ asset('site/assets/images/logos/Logo Agroveloz.svg') }}" class="max-w-[393px] 4k:max-w-[786px] ml-auto mr-16"/>
        </section>
    
        <!-- Cotações -->
        <section class="flex flex-col items-start gap-y-11 4k:gap-y-24">
            <div class="flex items-center justify-center gap-7 4k:gap-14">
                <img src="{{ asset('site/assets/images/icons/Trigo.svg') }}" alt="" class="w-20 4k:w-40"/>
                <div class="">
                    <h4 class="text-white font-black text-6xl 4k:text-9xl mb-0.5 4k:mb-1">Trigo</h4>
                    <span id="current_value_trigo" class="before:content-['R$_'] text-green font-black text-4xl 4k:text-7xl">{{ $quote->wheat_price }}</span>
                </div>
            </div>
    
            <div class="flex items-center justify-center gap-7 4k:gap-14">
                <img src="{{ asset('site/assets/images/icons/Milho.svg') }}" alt="" class="w-20 4k:w-40"/>
                <div class="">
                    <h4 class="text-white font-black text-6xl 4k:text-9xl mb-0.5 4k:mb-1">Milho</h4>
                    <span id="current_value_milho" class="before:content-['R$_'] text-green font-black text-4xl 4k:text-7xl">{{ $quote->corn_price }}</span>
                </div>
            </div>
    
            <div class="flex items-center justify-center gap-7 4k:gap-14">
                <img src="{{ asset('site/assets/images/icons/Soja.svg') }}" alt="" class="w-20 4k:w-40"/>
                <div class="">
                    <h4 class="text-white font-black text-6xl 4k:text-9xl mb-0.5 4k:mb-1">Soja</h4>
                    <span id="current_value_soja" class="before:content-['R$_'] text-green font-black text-4xl 4k:text-7xl">{{ $quote->soybean_price }}</span>
                </div>
            </div>
    
            <div class="flex items-center justify-center gap-7 4k:gap-14">
                <img src="{{ asset('site/assets/images/icons/Feijao.svg') }}" alt="" class="w-20 4k:w-40"/>
                <div class="">
                    <h4 class="text-white font-black text-6xl 4k:text-9xl mb-0.5 4k:mb-1">Feijão</h4>
                    <span id="current_value_feijao" class="before:content-['R$_'] text-green font-black text-4xl 4k:text-7xl">{{ $quote->bean_price }}</span>
                </div>
            </div>
    
            <div class="flex items-center justify-center gap-7 4k:gap-14">
                <img src="{{ asset('site/assets/images/icons/Dolar.svg') }}" alt="" class="w-20 4k:w-40"/>
                <div class="">
                    <h4 class="text-white font-black text-6xl 4k:text-9xl mb-0.5 4k:mb-1">Dólar <span class="text-4xl 4k:text-7xl">PTAX</span></h4>
                    <span id="current_value_dolar" class="before:content-['R$_'] text-green font-black text-4xl 4k:text-7xl">{{ $quote->dollar_price }}</span>
                </div>
            </div>
        </section>
    </article>
    
    <!-- Banners -->
    <aside class="w-[31.615%]">
        <div class="splide max-h-screen">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($quote->getMedia('gallery') as $image)
                        <li class="splide__slide" {{ strpos($image->mime_type, 'video') !== false ? "data-splide-html-video=".$image->getUrl() : "" }} >
                            {{ strpos($image->mime_type, 'image') !== false ? $image('full') : "" }}
                        </li>
                    @endforeach
                </ul>
                <div class="splide__progress">
                    <div class="splide__progress__bar absolute top-2.5 4k:top-5 h-1 4k:h-2 !bg-white/80 !mx-3.5 4k:!mx-7">
                </div>
              </div>
            </div>
        </div>
    </aside>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.8.0/dist/js/splide-extension-video.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function atualizarRelogio() {
                const relogioElemento = document.getElementById('clock');
                const agora = new Date();
                const hora = agora.getHours().toString().padStart(2, '0');
                const minutos = agora.getMinutes().toString().padStart(2, '0');
                relogioElemento.textContent = `${hora}:${minutos}`;
            }

            // Atualiza o relógio a cada segundo
            setInterval(atualizarRelogio, 1000); // 1s

            // Chama a função inicialmente para evitar atraso na exibição
            atualizarRelogio();

            function atualizarData() {
                const dataElemento = document.getElementById('date');
                const diaSemanaElemento = document.getElementById('weekday');

                // Pega a data atual
                var hoje = new Date();
                // Obtém o dia, mês e ano
                var dia = hoje.getDate();
                var diaDaSemana = hoje.getDay();
                var nomesDiasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
                var nomeDia = nomesDiasSemana[diaDaSemana];

                var mes = hoje.getMonth() + 1; // Os meses começam em 0 (janeiro) até 11 (dezembro)
                var ano = hoje.getFullYear();
                
                // Formata o dia e o mês para terem sempre dois dígitos
                if (dia < 10) {
                    dia = '0' + dia;
                }
                
                if (mes < 10) {
                    mes = '0' + mes;
                }

                // Monta a data no formato dd/mm/yyyy
                var dataFormatada = dia + '/' + mes + '/' + ano;
                dataElemento.textContent = dataFormatada;

                diaSemanaElemento.textContent = nomeDia;
            }

            // Atualiza a data a cada segundo
            setInterval(atualizarData, 1000*60*60*24); // 24hrs

            atualizarData();

            const testeSlide = function() {
                new Splide( '.splide',{
                        type   : 'fade',
                        autoplay: true,
                    
                        heightRatio: 0.5625,
                        cover      : true,
                    
                        video: {     
                        autoplay: true,
                        mute: true,
                        disableOverlayUI: true,
                        hideControls: true,
                        loop: false,
                    
                        playerOptions: {
                            youtube: {},
                            vimeo: {},
                            htmlVideo: {
                                playsInline: true
                            }
                        }
                    },
        
                        speed: 4000,
                        interval: 15000,
                        perPage: 1,
                    
                        rewind: true,
                        drag: 'free',
                        snap: true, 
                        
                        arrows: false,             
                        pagination: true,                 
                    
                        breakpoints: {
                        3840: { fixedHeight: 2160, },
                        1920:  { fixedHeight: 1080, },
                        },
                    }).mount(window.splide.Extensions);
            }

            document.addEventListener('js-refresh', e => {
                setTimeout(testeSlide, 100);
            });

        });

    </script>
    
</div>
