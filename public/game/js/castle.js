var CastleScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function CastleScene ()
    {
        Phaser.Scene.call(this, { key: 'CastleScene' });
    },

    preload: function ()
    {
        // map tiles
        this.load.image('castle-tiles', 'assets/tilesets/colored.png');
            
        // map in json format
        this.load.tilemapTiledJSON('castle-map', 'assets/tilemaps/king-castle.json');

    },

    create: function ()
    {    
        
             // create the map
        const map = this.make.tilemap({ key: 'castle-map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('colored', 'castle-tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('terrain', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('worldCollide', tiles, 0, 0);
        const layerEvents = map.createDynamicLayer('events', tiles, 0, 0);
        
        // make all tiles in obstacles collidable
        layerCollide.setCollisionByExclusion([-1]);
        // layerEvents.setCollisionByProperty('scroll');

        this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13] }),
            frameRate: 10,
            repeat: -1
        });
        // animation with key 'right'
        this.anims.create({
            key: 'right',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13] }),
            frameRate: 10,
            repeat: -1
        });
        this.anims.create({
            key: 'up',
            frames: this.anims.generateFrameNumbers('player', { frames: [2, 8, 2, 14]}),
            frameRate: 10,
            repeat: -1
        });
        this.anims.create({
            key: 'down',
            frames: this.anims.generateFrameNumbers('player', { frames: [ 0, 6, 0, 12 ] }),
            frameRate: 10,
            repeat: -1
        });        

        // our player sprite created through the phycis system
        this.player = this.physics.add.sprite(456, 252, 'player', 6);

        this.npc1 = this.physics.add.sprite(424, 216, 'npc');
        this.npc1.visible = false;

        this.npc2 = this.physics.add.sprite(456, 168, 'npc');
        this.npc2.visible = false;
        
        this.npc3 = this.physics.add.sprite(472, 136, 'npc');
        this.npc3.visible = false;

        this.npc4 = this.physics.add.sprite(488, 72, 'npc');
        this.npc4.visible = false;

        this.npc5 = this.physics.add.sprite(520, 120, 'npc');
        this.npc5.visible = false;

        this.scroll = this.physics.add.sprite(504, 232, 'scroll');
        this.scroll.visible = false;

        this.scroll2 = this.physics.add.sprite(408, 248, 'scroll');
        this.scroll2.visible = false;

        this.scroll3 = this.physics.add.sprite(216, 120, 'scroll');
        this.scroll3.visible = false;

        this.scroll4 = this.physics.add.sprite(552, 232, 'scroll');
        this.scroll4.visible = false;

        this.scroll5 = this.physics.add.sprite(632, 72, 'scroll');
        this.scroll5.visible = false;

        this.scroll6 = this.physics.add.sprite(696, 184, 'scroll');
        this.scroll6.visible = false;

        this.scroll7 = this.physics.add.sprite(552, 168, 'scroll');
        this.scroll7.visible = false;

        this.mirror1 = this.physics.add.sprite(344, 200, 'mirror');
        this.mirror1.visible = false;
        
        this.mirror2 = this.physics.add.sprite(344, 136, 'mirror');
        this.mirror2.visible = false;

        this.chest1 = this.physics.add.sprite(312, 232, 'chest');
        this.chest1.visible = false;

        this.chest2 = this.physics.add.sprite(312, 200, 'chest');
        this.chest2.visible = false;

        this.chest3 = this.physics.add.sprite(312, 136, 'chest');
        this.chest3.visible = false;

        this.chest4 = this.physics.add.sprite(424, 72, 'chest');
        this.chest4.visible = false;

        this.book = this.physics.add.sprite(408, 118, 'book');
        this.book.visible = false;

        this.leaveCastle = this.physics.add.sprite(455, 272, 'door');
        this.leaveCastle.visible = false;
        

       
        
        // don't go out of the map
        this.physics.world.bounds.width = map.widthInPixels;
        this.physics.world.bounds.height = map.heightInPixels;
        this.player.setCollideWorldBounds(true);
        
        // don't walk on walls
        this.physics.add.collider(this.player, layerCollide);
        // limit camera to map
        this.cameras.main.setBounds(0, 0, map.widthInPixels, map.heightInPixels);
        this.cameras.main.startFollow(this.player);
        this.cameras.main.roundPixels = true; // avoid tile bleed
    
        // user input
        this.cursors = this.input.keyboard.createCursorKeys();
        
        this.physics.add.overlap(this.player, this.leaveCastle, this.onLeaveCastle, false, this);
        this.physics.add.overlap(this.player, this.npc1, this.displayMessageNPC1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc2, this.displayMessageNPC2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc3, this.displayMessageNPC3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc4, this.displayMessageNPC4, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc5, this.displayMessageNPC5, this.processCallback, this);
        this.physics.add.overlap(this.player, this.mirror1, this.displayMessageMirror, this.processCallback, this);
        this.physics.add.overlap(this.player, this.mirror2, this.displayMessageMirror, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll, this.displayMessageScroll, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll2, this.displayMessageScroll2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll3, this.displayMessageScroll3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll4, this.displayMessageScroll4, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll5, this.displayMessageScroll5, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll6, this.displayMessageScroll6, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll7, this.displayMessageScroll7, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest1, this.displayMessageChest1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest2, this.displayMessageChest2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest3, this.displayMessageChest3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest4, this.displayMessageChest4, this.processCallback, this);
        this.physics.add.overlap(this.player, this.book, this.displayMessageBook, this.processCallback, this);
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
        
    },
    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    onLeaveCastle: function(player, zone) {   
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');     
        this.scene.sleep();
        this.scene.start('WorldScene');
    },
    processCallback: function(gameObject1, gameObject2) {
        
        if(this.dialog){
            gameObject1.x -= ((gameObject2.x - gameObject1.x)/3);
            gameObject1.y -= ((gameObject2.y - gameObject1.y)/3);
           
            var timer = this.time.addEvent({
                delay: 1000,                // ms
                callback: this.dialogCallback,
                callbackScope: this,
                loop: false
            });
            return false;  // return false will discard remaining collision checking
        }
        else
            return true;
    },

    dialogCallback : function(){
        this.dialog = false;
    },

    displayMessageNPC1: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Ancião diz:\nEstou velho demais para lutar. Me desculpe, Rei Ianes.', true);
        this.dialog = true; 
    },
    displayMessageNPC2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Velhote diz:\nQuer um conselho, garoto? Fuja enquanto pode. Tempos de escuridão e tormento estão por vir...', true);
        this.dialog = true; 
    },

    displayMessageNPC3: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Velhote diz:\nTome e leve contigo, esta espada mágica e virá a calhar alguma hora.\nGanhou: Espada de Aço Élfico (+9 de Ataque).', true);
        this.dialog = true;
        weapon = "Espada de Aço Élfico (+9 de Ataque)";
        atk = 9;
    },

    displayMessageNPC4: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Guardião diz:\nEu sou o Guardião do tesouro ao final deste corredor.\nPara abri-lo, é necessário 3 Chaves Mágicas. Ache-as e traga-as para mim.', true);
        this.dialog = true; 
    },

    displayMessageNPC5: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Guarda diz:\nEsta é a Sala das Relíquias. As relíquias são guardadas em salas diferentes mas ainda não estão disponíveis para este patch de Agonizing Village', true);
        this.dialog = true; 
    },

    displayMessageMirror: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Você diz(Em frente do espelho):\nHmm, nada mal para um bruxo de 100 anos', true);
        this.dialog = true; 
    },

    displayMessageScroll: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nAquele guardião rabugento não me deixa abrir o tesouro sem as Chaves Mágicas. EU SOU O REI!!!', true);
        this.dialog = true; 
    },

    displayMessageScroll2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nCuidado com a Caverna. Uma vez que entrar, não é possível voltar, deverá seguir em frente até o final.', true);
        this.dialog = true; 
    },
    displayMessageScroll3: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nO Comandante Imperial saiu sozinho em uma jornada para buscar o Rei. Nunca mais voltou...', true);
        this.dialog = true; 
    },

    displayMessageScroll4: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nOs itens na Sala das Relíquias serão implementados num patch futuro de Agonizing Village.', true);
        this.dialog = true; 
    },

    displayMessageScroll5: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nAperte I para abrir o seu inventário e aperte novamente para fecha-lo.', true);
        this.dialog = true; 
    },

    displayMessageScroll6: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nNão é possível utilizar itens fora de combate e todos os itens são únicos, use-os sabiamente.', true);
        this.dialog = true; 
    },

    displayMessageScroll7: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nItens não-consumíveis são equipados automaticamente. Por isso, não se preocupe em equipar uma nova Espada ou Armadura quando encontrar alguma.', true);
        this.dialog = true; 
    },
    openInvetory : function(){
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        console.log("inventario aberto");
        this.sys.install('InventModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('## INVENTÁRIO ##\n\nArmadura: '+armor+'\nBotas: '+boots+'\nEspada: '+weapon+'\n\n## STATUS ##\n\nVida: '+hp+'\nMana: '+mana+'\nAtaque: '+atk+'\nDefesa: '+def, true);
        this.dialog = true; 
    
    },

    displayMessageChest1: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou Armadura de Mithril.\n+4 de Defesa.', true);
        this.dialog = true;
        this.chest1.destroy()
        def = def+4;
        armor="Armadura de Mithril (+4 de Defesa)";
    },

    displayMessageChest2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou Éter 50ml e Adrenalina 1 frasco.\nÉter: Recupera 50HP\nAdrenalina: Dobra seu ataque por 2 turnos.', true);
        this.dialog = true; 
        this.chest2.destroy()
        itens.push("Éter 50ml","Adrenalina");
    },

    displayMessageChest3: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nVazio.', true);
        this.dialog = true; 
        this.chest3.destroy()
    },

    displayMessageChest4: function() {
        if(magicalKey==3){
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Baú:\nEncontrou uma itens encantados.\nBotas Encantadas: +10 de Defesa\nArmadura Encantada: +10 de Defesa\nEspada Encantada: +25 de Ataque', true);
            this.dialog = true; 
            this.chest4.destroy()
            boots = "Botas Encantadas (+10 de Defesa)";
            armor = "Armadura Encantada (+10 de Defesa)";
            weapon = "Espada Encantada (+25 de Ataque)";
            def = def+20;
            atk = atk+25;
            magicalKey == 0;
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê não possui as 3 chaves mágicas.', true);
            this.dialog = true; 
        }
    },

    displayMessageBook: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\nHá uma Chave Mágica perdida na Floresta. Cuidado com os monstros...', true);
        this.dialog = true; 
        
    },

    update: function (time, delta)
    {             
        if(InventoryKey.isDown){
            InventoryKey = undefined;
            this.openInvetory();
        }    
        this.player.body.setVelocity(0);
        
        // Horizontal movement
        if (this.cursors.left.isDown)
        {
            this.player.body.setVelocityX(-90);
        }
        else if (this.cursors.right.isDown)
        {
            this.player.body.setVelocityX(90);
        }
        // Vertical movement
        if (this.cursors.up.isDown)
        {
            this.player.body.setVelocityY(-90);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.body.setVelocityY(90);
        }        

        // Update the animation last and give left/right animations precedence over up/down animations
        if (this.cursors.left.isDown)
        {
            this.player.anims.play('left', true);
            this.player.flipX = true;
        }
        else if (this.cursors.right.isDown)
        {
            this.player.anims.play('right', true);
            this.player.flipX = false;
        }
        else if (this.cursors.up.isDown)
        {
            this.player.anims.play('up', true);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.anims.play('down', true);
        }
        else
        {
            this.player.anims.stop();
        }
    }
});