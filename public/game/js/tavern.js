var TavernScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function TavernScene ()
    {
        Phaser.Scene.call(this, { key: 'TavernScene' });
    },

    preload: function ()
    {
        // map tiles
        this.load.image('tavern-tiles', 'assets/tilesets/tavern-tiles.png');
            
        // map in json format
        this.load.tilemapTiledJSON('tavern-map', 'assets/tilemaps/tavern.json');
    },

    create: function ()
    {    
        debugger;
       
             // create the map
        const map = this.make.tilemap({ key: 'tavern-map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('tavern-tiles', 'tavern-tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('tavern-ground', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('tavern-collide', tiles, 0, 0);
        const layerEvents = map.createDynamicLayer('tavern-events', tiles, 0, 0);
        
        // make all tiles in obstacles collidable
        layerCollide.setCollisionByExclusion([-1]);
        // layerEvents.setCollisionByProperty('scroll');

        // animation with key 'right'
        this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13]}),
            frameRate: 10,
            repeat: -1
            
        });
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

        //Cria sprite do personagem
        this.player = this.physics.add.sprite(456, 248, 'player', 6);

        // Cria todos os sprites da cena
        this.leaveTavern = this.physics.add.sprite(456, 270, 'door');
        this.leaveTavern.visible = false;

        this.blockedDoor = this.physics.add.sprite(555, 216, 'door');
        this.blockedDoor.visible = false;

        this.chest1 = this.physics.add.sprite(392, 72, 'chest');
        this.chest1.visible = false;

        this.chest2 = this.physics.add.sprite(104, 120, 'chest');
        this.chest2.visible = false;

        this.chest3 = this.physics.add.sprite(104, 200, 'chest');
        this.chest3.visible = false;

        this.guard1 = this.physics.add.sprite(168, 88, 'npc');
        this.guard1.visible = false;

        this.guard2 = this.physics.add.sprite(264, 104, 'npc');
        this.guard2.visible = false;

        this.guard3 = this.physics.add.sprite(184, 200, 'npc');
        this.guard3.visible = false;

        this.guard4 = this.physics.add.sprite(328, 168, 'npc');
        this.guard4.visible = false;

        this.guard5 = this.physics.add.sprite(408, 136, 'npc');
        this.guard5.visible = false;

        this.npc1 = this.physics.add.sprite(56, 248, 'npc');
        this.npc1.visible = false;

        this.npc2 = this.physics.add.sprite(232, 216, 'npc');
        this.npc2.visible = false;

        this.npc3 = this.physics.add.sprite(216, 248, 'npc');
        this.npc3.visible = false;

        this.npc4 = this.physics.add.sprite(328, 88, 'npc');
        this.npc4.visible = false;

        this.npc5 = this.physics.add.sprite(312, 88, 'npc');
        this.npc5.visible = false;

        this.npc6 = this.physics.add.sprite(440, 168, 'npc');
        this.npc6.visible = false;

        this.npc7 = this.physics.add.sprite(440, 216, 'npc');
        this.npc7.visible = false;

        this.npc8 = this.physics.add.sprite(504, 104, 'npc');
        this.npc8.visible = false;

        this.npc9 = this.physics.add.sprite(472, 152, 'npc');
        this.npc9.visible = false;

        this.npc10 = this.physics.add.sprite(488, 152, 'npc');
        this.npc10.visible = false;
        
        this.npc11 = this.physics.add.sprite(488, 216, 'npc');
        this.npc11.visible = false;

        this.npc12 = this.physics.add.sprite(360, 88, 'npc');
        this.npc12.visible = false;

        
        // don't go out of the map
        this.physics.world.bounds.width = map.widthInPixels;
        this.physics.world.bounds.height = map.heightInPixels;
        this.player.setCollideWorldBounds(true);
        
        // don't walk on trees
        this.physics.add.collider(this.player, layerCollide);
        // limit camera to map
        this.cameras.main.setBounds(0, 0, map.widthInPixels, map.heightInPixels);
        this.cameras.main.startFollow(this.player);
        this.cameras.main.roundPixels = true; // avoid tile bleed
    
        // user input
        this.cursors = this.input.keyboard.createCursorKeys();
        
        //Cria todas as colisões com os sprites de eventos
        this.physics.add.overlap(this.player, this.leaveTavern, this.onLeaveTavern, false, this);
        this.physics.add.overlap(this.player, this.blockedDoor, this.displayMessageBlockedDoor, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest1, this.displayMessageChest1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest2, this.displayMessageChest2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest3, this.displayMessageChest3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.guard1, this.displayMessageGuard1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.guard2, this.displayMessageGuard2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.guard3, this.displayMessageGuard3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.guard4, this.displayMessageGuard4, this.processCallback, this);
        this.physics.add.overlap(this.player, this.guard5, this.displayMessageGuard5, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc1, this.displayMessageNPC1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc2, this.displayMessageNPC2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc3, this.displayMessageNPC3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc4, this.displayMessageNPC4, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc5, this.displayMessageNPC5, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc6, this.displayMessageNPC6, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc7, this.displayMessageNPC7, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc8, this.displayMessageNPC8, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc9, this.displayMessageNPC9, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc10, this.displayMessageNPC10, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc11, this.displayMessageNPC11, this.processCallback, this);
        this.physics.add.overlap(this.player, this.npc12, this.displayMessageNPC12, this.processCallback, this);
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
      
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
        
        
    },
    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    displayMessageBlockedDoor: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Aviso:\nEntrada permitida somente para pessoas autorizadas.', true);
        this.dialog = true; 
    },
    displayMessageChest1: function() {
        if (chestTavern1==false) {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou Botas de Ferro.\n\n+1 de Defesa.', true);
        this.dialog = true;
        chestTavern1 = true;
        def = def+1
        boots = "Bota de Ferro (+1 de Defesa)";
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê já abriu este baú.', true);
            this.dialog = true;
        }
    },
    displayMessageChest2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou uma nota:\n           "Alguns dizem que o Rei não é uma boa pessoa. Será que realmente é verdade?"', true);
        this.dialog = true;        
    },
    displayMessageChest3: function() {
        if (chestTavern3==false) {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou Revigorante.\n\nRevigorante: Restaura HP e Mana completamente.', true);
        this.dialog = true;
        chestTavern3 = true;
        itens.push("Revigorante");
        console.log(itens[0]);
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê já abriu este baú.', true);
            this.dialog = true;
        }
    },
    displayMessageGuard1: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Guarda:\nEu tentei ir atrás do Rei, mas nada pude fazer diante tamanha força daquele ser.', true);
        this.dialog = true;        
    },

    displayMessageGuard2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Guarda:\n... ... ... SAIA DAQUI!!!', true);
        this.dialog = true;        
    },
    displayMessageGuard3: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Glenn:\nO comandante me nomeou como Capitão, mas o que poderei fazer sem uma tropa para me acompanhar?\nMeus homens estão com medo e cansados, não poderei participar desta batalha.', true);
        this.dialog = true;        
    },

    displayMessageGuard4: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Guarda:\nNosso capitão falou para ficarmos cuidando do reino. Eu acho que ele está com medo mas mantém a posição de um grande líder.\nEu o admiro!', true);
        this.dialog = true;        
    },
    displayMessageGuard5: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Guarda:\nO comandante nomeou Glenn como capitão e saiu sozinho pela floresta e nunca mais retornou...', true);
        this.dialog = true;        
    },

    displayMessageNPC1: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nEu cuido das estadias daqui. Não encoste na cama, eu acabei de arrumar!!!', true);
        this.dialog = true;        
    },

    displayMessageNPC2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nJÁ FAZEM.... ÉÉÉ... EU NÃO SEI, ESTOU AQUI HÁ MUITO TEMPO. (burrrp!)', true);
        this.dialog = true;        
    },
    displayMessageNPC3: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nEstamos preocupados com nosso rei', true);
        this.dialog = true;        
    },
    
    displayMessageNPC4: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nEstou trabalhando, não me encha!.', true);
        this.dialog = true;        
    },

    displayMessageNPC5: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nEstou trabalhando, não me encha!.', true);
        this.dialog = true;        
    },
    displayMessageNPC6: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nDesde que o Rei fora raptado... é... eu não posso lhe contar isso. Desculpe!', true);
        this.dialog = true;        
    },
    displayMessageNPC7: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nVamos, se junte à nós, peça um copo de cerveja e vamos beber', true);
        this.dialog = true;        
    },
    displayMessageNPC8: function() {
        if (npc7==false) {
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Cidadão:\nEu... (burrrp)\n\nVocê: Ele desmaiou.', true);
            this.dialog = true;
            npc7 = true; 
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Cidadão:\nZZZzzzZZz...', true);
            this.dialog = true;
        }      
    },
    displayMessageNPC9: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nEstou com medo', true);
        this.dialog = true;        
    },

    displayMessageNPC10: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nCuidado com a floresta, há rumores de sussurros vindo de lá.', true);
        this.dialog = true;        
    },

   
    displayMessageNPC11: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nEstou ocupado. Saia daqui.', true);
        this.dialog = true;        
    },
    displayMessageNPC12: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Cidadão:\nMinha taverna é aconchegante, não acha?.', true);
        this.dialog = true;        
    },
    onLeaveTavern: function(player, zone) {     
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');   
        this.scene.sleep();
        this.scene.start('WorldScene');
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