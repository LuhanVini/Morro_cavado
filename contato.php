<div class="container">

        <div class="row justify-content-center">

            <div class="title col-12 col-lg-8">

                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">ENTRE EM CONTATO</h2>

                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5" style="color:#004730";><b>Em caso de dúvidas, deixe uma mensagem e nós retornaremos em breve.</b> 

                </h3>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="row justify-content-center">

            <div class="media-container-column col-lg-8">

                <!---Formbuilder Form--->

                <form enctype="multipart/form-data" class="table" action="email/envia_email.php" method="POST" role="form">				

                    <div class="dragArea row">

                        <div class="col-md-4  form-group" data-for="name">

                            <label for="name-form1-14" class="form-control-label mbr-fonts-style display-7">Nome</label>

                            <input type="text" name="Nome" data-form-field="Name" required="required" class="form-control display-7" id="name-form1-14" value="<?=@$Nome?>">

                        </div>

                        <div class="col-md-4  form-group" data-for="email">

                            <label for="email-form1-14" class="form-control-label mbr-fonts-style display-7">Email</label>

                            <input type="email" name="email" data-form-field="Email" required="required" class="form-control display-7" id="email-form1-14" value="<?=@$email?>">

                        </div>

                        <div data-for="phone" class="col-md-4  form-group">

                            <label for="phone-form1-14" class="form-control-label mbr-fonts-style display-7">Telefone</label>

                            <input type="tel" name="telefone" data-form-field="Phone" class="form-control display-7" id="phone-form1-14"  value="<?=@$telefone?>">

                        </div>

                        <div data-for="message" class="col-md-12 form-group">

                            <label for="message-form1-14" class="form-control-label mbr-fonts-style display-7">Mensagem</label>

                            <textarea name="mensagem" data-form-field="Message" class="form-control display-7" id="message-form1-14" value="<?=@$mensagem?>"></textarea>

                        </div>

                        <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-form btn-secondary display-4">Enviar</button></div>

                    </div>

                </form><!---Formbuilder Form--->

            </div>

        </div>

    </div>