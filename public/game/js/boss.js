var BossScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function BossScene ()
    {
        Phaser.Scene.call(this, { key: 'BossScene' });
    },

    preload: function ()
    {
        // map tiles
        this.load.image('boss-tiles', 'assets/tilesets/boss-tileset.png');
            
        // map in json format
        this.load.tilemapTiledJSON('boss-map', 'assets/tilemaps/boss-castle.json');
      
    },

    create: function ()
    {    
        
             // create the map
        const map = this.make.tilemap({ key: 'boss-map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('boss-tileset', 'boss-tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('boss-ground', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('boss-collide', tiles, 0, 0);
        // const layerEvents = map.createDynamicLayer('events', tiles, 0, 0);
        
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
        this.player = this.physics.add.sprite(376, 360, 'player', 6);

        this.king = this.physics.add.sprite(568, 56, 'king');
        this.king.visible = true;

        this.closeGame = this.physics.add.sprite(600, 40, 'npc');
        this.closeGame.visible = false;

        this.prisionDoor = this.physics.add.sprite(568, 72, 'prision-door');
        this.prisionDoor.visible = true;

        this.scroll = this.physics.add.sprite(568, 40, 'scroll');
        this.scroll.visible = false;

        this.humanBoss = this.physics.add.sprite(376, 56, 'human-boss');
        this.humanBoss.visible = true;

        this.nearhumanboss = this.physics.add.sprite(376, 64, 'human-boss');
        this.nearhumanboss.visible = false;

        this.neardemonboss = this.physics.add.sprite(520, 184, 'human-boss');
        this.neardemonboss.visible = false;

        this.demonBoss = this.physics.add.sprite(552, 184, 'demon-boss');
        this.demonBoss.visible = false;

        this.edward = this.physics.add.sprite(552, 184, 'npc');
        this.edward.visible = false;

        this.leaveBoss = this.physics.add.sprite(376, 386, 'door');
        this.leaveBoss.visible = false;
        
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
       
        
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
        
        this.physics.add.overlap(this.player, this.leaveBoss, this.onLeaveBoss, false, this);
        this.physics.add.overlap(this.player, this.king, this.displayMessageKing, this.processCallback, this);
        this.physics.add.overlap(this.player, this.prisionDoor, this.removePrisionDoor, false, this);
        this.physics.add.overlap(this.player, this.closeGame, this.CloseGame, false, this);
        this.physics.add.overlap(this.player, this.humanBoss, this.onMeetBoss, this.processCallback, this);
        this.physics.add.overlap(this.player, this.edward, this.onMeetEdward, this.processCallback, this);
        this.physics.add.overlap(this.player, this.scroll, this.onReadScroll, this.processCallback, this);
        this.physics.add.overlap(this.player, this.nearhumanboss, this.onNearBoss, this.processCallback, this);
        this.physics.add.overlap(this.player, this.neardemonboss, this.onNearDemon, this.processCallback, this);
        this.physics.add.overlap(this.player, this.demonBoss, this.onMeetDemonBoss, this.processCallback, this);
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
       
        
    },
    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    onLeaveBoss: function(player, zone) {   
        spawnPoint = "florest";
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');     
        this.scene.sleep();
        this.scene.start('FlorestScene');
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
    CloseGame: function() {
        window.location.href = "http://localhost/SteelFreak/public/index.php?pagina=pageWiki"
    },
    onReadScroll: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('FullScreenDialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Agonizing Village III\n\nVocê chegou ao fim de Agonizing Village III.\n\nO Rei Ianes conjurou uma magia com os poderes da Coroa e viajou entre o espaço-tempo, fugindo permanentemente (ou não?) de Geraldo.\nGeraldo, por sua vez, não retornou ao reinado pois seria acusado como um traidor e sua cabeça seria caçada. Portanto, o grande bruxo Geraldo saiu em viagem pelo mundo para aprimorar suas habilidades e se tornar poderoso o suficiente para conseguir abrir uma fenda no espaço-tempo e buscar a vingança contra o Rei Ianes. Mas esta é uma história para um próximo Agonizing Village.\n\nE aí? Gostou do jogo? Por favor, nos dê seu feedback: steelfrealbrasil@gmail.com \n\nNos despedimos por aqui por enquanto mas, sinta-se a vontade para sempre jogar nosso jogo Agonizing Village III.\n\nAgradecimento especial: Alisson Pospor\nProfessores(as): Juliana Martins, Jean Capote, João Pereira, que nos ensinaram, acompanharam e apoiaram a realizar este projeto.\n\nAnde até o bloco com símbolo de "!"', true);
        this.dialog = true;
        this.scroll.destroy();
    },

    removePrisionDoor: function() {
        this.prisionDoor.destroy(); 
        
    },
    displayMessageKing: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Rei Ianes diz:\nAgora que esse imbecil lhe contou tudo, não poderei deixar que se aproxime. Estou indo nesse, nos encontramos no inferno!\n\nAviso: Ianes utiliza os poderes de sua coroa mágica e foge pelo espaço-tempo.', true);
        this.dialog = true; 
        this.king.destroy();
        
    },
    onNearDemon: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('??? diz:\nVocê não pensou que seria tão fácil, pensou?\nCONHEÇA MINHA VERDADEIRA FORMA!!!!', true);
        this.dialog = true;
        this.cameras.main.shake(300);    
        this.neardemonboss.destroy();
    },
    onMeetDemonBoss: function() {
        FinalBoss = true;
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.cameras.main.shake(300);    
      
    
        this.input.stopPropagation();
        // start battle 
        this.scene.switch('BattleScene');
        this.demonBoss.destroy(); 
    },
    onNearBoss: function(player, zone) {         
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Homem diz:\nAlto lá! Daqui ninguém poderá passar. Se quiserem continuar, terão que me enfrentar. ', true);
        this.dialog = true;
        this.cameras.main.shake(300);    
        this.nearhumanboss.destroy();
   
},
    onMeetBoss: function(player, zone) {     
            boss = true;    
            spawnPoint = "boss"
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
               
            // we move the zone to some other location
            zone.x = Phaser.Math.RND.between(0, this.physics.world.bounds.width);
            zone.y = Phaser.Math.RND.between(0, this.physics.world.bounds.height);
            this.input.stopPropagation();
            // start battle 
            this.scene.switch('BattleScene');
            this.humanBoss.destroy();
       
    },
    onMeetEdward: function(player, zone) {         
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Edward diz:\nO Rei.. não é quem você pensa que é, tome cuidado! Ele vendeu a alma há 50 anos atrás para os demônios, ele só foi sequestrado por causa de sua coroa mágica, feita de Ouro Élfico. Geraldo... você me salvou deste feitiço, agora poderei descansar em paz...  ', true);
        this.dialog = true;
        this.edward.destroy();
   
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