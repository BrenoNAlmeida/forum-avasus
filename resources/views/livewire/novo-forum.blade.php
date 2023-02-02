
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Criar novo forum
                    </button>
                </div>

                <div class="card-body">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- form criar novo forum modal-->

<div class="modal-group row">
    <form>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="titulo">titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titulo" placeholder="titulo">
                @error('titulo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="descricao">descricao</label>
            <div class="col-sm-10">
                <input  type="text" class="form-control" id="descricao" placeholder="Descricao">
                @error('titulo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="categoria_id">categoria</label>
            <div class="col-sm-10">
                <input  type="text" class="form-control" id="categoria" placeholder="Nome do forum">
                @error('titulo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

                <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="categoria_id">categoria</label>
            <div class="col-sm-10">
                <button wire:click="submit" class="btn btn-sm btn-primary">Salvar</button>
            </div>
        </div>
    </form>
</div>

