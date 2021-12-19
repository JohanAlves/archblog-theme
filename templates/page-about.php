<section class="banner">
        <div class="container">
            <div class="banner_content">
                <h1>A Little More About Me</h1>
            </div>
        </div>
    </section>

    <section class="about-me">
        <div class="container">
            <?php echo wp_get_attachment_image( 59, 'large'); ?>
            <div class="about-me_content">
                <h2>About my Inspirations</h2>
                <div class="about-me_text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto nesciunt, dolorem consequuntur,
                        magnam tenetur minima possimus beatae fugiat distinctio vitae perferendis culpa sit quidem dolorum
                        amet libero facilis aliquid nulla inventore temporibus.</p>
                    <p>Quaerat vero incidunt alias iusto cumque iste! Architecto atque vel non asperiores voluptatem eius
                        voluptate, dicta praesentium quidem et saepe dolores quo dolorem placeat cumque blanditiis beatae
                        itaque omnis cum perferendis doloremque?</p>
                    <p>Eum temporibus quidem, iusto, sed perspiciatis quam nihil ab ipsum omnis, ullam harum esse beatae
                        aliquam exercitationem sunt repellat expedita! Sit ducimus maiores libero repellendus consectetur,
                        beatae fuga? Maxime saepe impedit consequatur quaerat vel vero laborum.</p>
                </div>
            </div>
        </div>
    </section>


    <?php 
    get_template_part( 'templates/section','subscribe'); 
    
    get_template_part( 'templates/section','instagram');
    ?>


    