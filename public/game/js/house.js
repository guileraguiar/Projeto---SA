var HouseScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function HouseScene ()
    {
        Phaser.Scene.call(this, { key: 'HouseScene' });
    },

    preload: function ()
    {
            // map tiles
            this.load.image('house-tiles', 'assets/tilesets/colored.png');
        
            // map in json format
            this.load.tilemapTiledJSON('house-map', 'assets/tilemaps/house.json');

    },
    create: function ()
    {    
        
             // create the map
        const map = this.make.tilemap({ key: 'house-map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('colored', 'house-tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('house-ground', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('house-collide', tiles, 0, 0);
        const layerEvents = map.createDynamicLayer('house-events', tiles, 0, 0);
        
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

        // our player sprite created through the phycis system
        this.player = this.physics.add.sprite(360, 245, 'player', 6);

        this.startScroll = this.physics.add.sprite(360, 245, 'scroll');
        this.startScroll.visible = false;

        this.leaveHouse = this.physics.add.sprite(360, 272, 'door');
        this.leaveHouse.visible = false;
        
        this.blueDoor = this.physics.add.sprite(456, 248, 'blue-door');
        this.blueDoor.visible = true;

        this.chest1 = this.physics.add.sprite(472, 232, 'chest');
        this.chest1.visible = false;

        this.chest2 = this.physics.add.sprite(488, 232, 'chest');
        this.chest2.visible = false;

        this.armor = this.physics.add.sprite(442, 104, 'leather-armor');
        this.armor.visible = false;

        this.scroll = this.physics.add.sprite(440, 122, 'scroll');
        this.scroll.visible = false;

        this.scroll2 = this.physics.add.sprite(328, 88, 'scroll');
        this.scroll2.visible = false;

        this.bed = this.physics.add.sprite(391, 87, 'small-bed');
        this.bed.visible = false;

        this.book = this.physics.add.sprite(298, 87, 'book');
        this.book.visible = false;
        
       
        
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
        
        this.physics.add.overlap(this.player, this.leaveHouse, this.onLeaveHouse, false, this);
        this.physics.add.overlap(this.player, this.blueDoor, this.openBlueDoor, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest1, this.displayMessageChest1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest2, this.displayMessageChest2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.armor, this.displayMessageArmor, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll, this.displayMessageScroll, this.processCallback, this);
        this.physics.add.overlap(this.player, this.startScroll, this.displayStartScroll, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll2, this.displayMessageScroll2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.bed, this.displayMessageBed, this.processCallback, this);
        this.physics.add.overlap(this.player, this.book, this.displayMessageBook, this.processCallback, this);
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
  
        
        
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
    displayStartScroll: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('FullScreenDialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Bem Vindo à Agonizing Village III\n\nGeraldo acorda em sua casa com uma mensagem do Duque em sua porta que dizia: "Geraldo, você está sendo convocado para procurar o nosso Rei, Ianes. Realizaremos para você qualquer desejo que queiras desde que traga-o são e salvo para o nosso reinado. Lembre-se, caso recuse esta convocação, trataremos como desonra e desobediência direta à corte, sendo aplicada todas as leis impostas pelo Rei, em outras palavras, você será tratado como criminoso e terá uma recompensa por sua cabeça."\nGeraldo, ao ler esta mensagem, pega seus pertences e inicia sua jornada. Apesar de não temer o exército do império, seria um incomodo ter uma recompensa por sua cabeça.\n\nInstruções: Ao encostar em um objeto interativo, uma ação será realizada, preste atenção, existem objetos invisíveis.\n\nAções: Utilize as setas do teclado ou as teclas W A S D para andar.\n\nEm batalha: Setas CIMA e BAIXO realizam a navegação nos menus e BARRA DE ESPAÇO confirma a ação selecionada.\n\nBoa sorte!', true);
        this.dialog = true;
        this.startScroll.destroy();
    },

    openBlueDoor: function() {
        if(blueKey){
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso: Chave Azul utilizada.', true);
            this.dialog = true;
            delay:1000;
            this.blueDoor.destroy()
            blueKey == 0;
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê não possui a Chave Azul.', true);
            this.dialog = true; 
        }
    },
    displayMessageChest1: function() {
        if(chestHouse1==false){
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou 1 Chave Mágica.', true);
        this.dialog = true;
        this.chest1.destroy()
        chestHouse1 = true;
        magicalKey += 1;
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê já abriu este baú.', true);
            this.dialog = true;
            this.chest1.destroy()
        }
    },
    displayMessageChest2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText("Baú:\nEncontrou uma nota com a seguinte frase: REPLANTAR FATO SOL.\n\nDICA: Siga em frente no segundo letreiro", true); //PORTAL NA FLORESTA
        this.dialog = true;
    },
    displayMessageScroll: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText("Nota:\nHá rumores de que uma criatura de formato humanoide com uma capa preta com vermelha tenha levado o Rei para a Floresta.", true);
        this.dialog = true;
    },
    displayMessageScroll2: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Nota:\n"Vá até o Castelo e obtenha mais informações. Todas as anotações são importantes."', true);
        this.dialog = true;
    },
    displayMessageBed: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText("Você:\nAgora não é hora de descansar, preciso achar o Rei e trazer a paz novamente para este reinado.", true); 
        this.dialog = true;
    },
    displayMessageBook: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText("Nota:\nEncontrou uma nota [2/3]:\nRei [...] não [...] demônio [...] vingança [...]\nVocê: O que isso quer dizer?.", true); 
        this.dialog = true;
    },
    displayMessageArmor: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText("Você:\nEsta Armadura de Couro não serve mais em mim.", true); 
        this.dialog = true;
    },
    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    onLeaveHouse: function(player, zone) { 
       
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
            this.player.body.setVelocityX(-45);
        }
        else if (this.cursors.right.isDown)
        {
            this.player.body.setVelocityX(45);
        }
        // Vertical movement
        if (this.cursors.up.isDown)
        {
            this.player.body.setVelocityY(-45);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.body.setVelocityY(45);
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