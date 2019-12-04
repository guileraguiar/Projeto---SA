var BattleScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function BattleScene ()
    {
        Phaser.Scene.call(this, { key: "BattleScene" });
    },
    create: function ()
    {    

        if(spawnPoint=="cave"){
            var background = this.add.image(384, 192, "caveBackground");
        }else if (spawnPoint=="florest"){
            var background = this.add.image(384, 192, "florestBackground");
        }else{
            var background = this.add.image(384, 192, "caveBackground");
        }
        this.startBattle();
        // on wake event we call startBattle too
        this.sys.events.on('wake', this.startBattle, this);             
    },
    startBattle: function() {
        
        
        // player character - geraldo
        var geraldo = new PlayerCharacter(this, 250, 50, "player", 1, "Geraldo");        
        this.add.existing(geraldo);
        geraldo.visible=false;
        console.log(enemyRandom);
        if (boss==true){
            var drawed = new Enemy(this, 290, 100, "finalboss", null, "drawed");
            this.add.existing(drawed);
            this.enemies = [ drawed ];
        }else{
            var enemyRandom = Math.floor(Math.random() * 6);
            if (enemyRandom == 0) {
                var bat = new Enemy(this, 290, 100, "bat", null, "Morc");
                this.add.existing(bat);
                var bat2 = new Enemy(this, 490, 100, "bat", null,"Greel");
                this.add.existing(bat2);
                this.enemies = [ bat, bat2 ];
            }else if (enemyRandom==1){
                var ghost = new Enemy(this, 290, 100, "ghost", null, "Gousty");
                this.add.existing(ghost);
                var ghost2 = new Enemy(this, 490, 100, "ghost", null,"Sleeper");
                this.add.existing(ghost2);
                this.enemies = [ ghost, ghost2 ];
            }else if (enemyRandom==2){
                var skeleton = new Enemy(this, 290, 100, "skeleton", null, "Necro");
                this.add.existing(skeleton);
                var skeleton2 = new Enemy(this, 490, 100, "skeleton", null,"Mancer");
                this.add.existing(skeleton2);
                this.enemies = [ skeleton, skeleton2 ];
            }else if (enemyRandom==3){
                var bat = new Enemy(this, 290, 100, "bat", null, "Zabbu");
                this.add.existing(bat);
                var ghost = new Enemy(this, 490, 100, "ghost", null,"Bell");
                this.add.existing(ghost);
                this.enemies = [ ghost, bat ];
            }else if (enemyRandom==4){
                var skeleton = new Enemy(this, 290, 100, "bat", null, "Raqki");
                this.add.existing(skeleton);
                var skeleton2 = new Enemy(this, 490, 100, "skeleton", null,"Ettercap");
                this.add.existing(skeleton2);
                this.enemies = [ skeleton, skeleton2 ];
            }else if (enemyRandom==5){
                var ghost = new Enemy(this, 190, 100, "ghost", null, "Ankheg");
                this.add.existing(ghost);
                var bat = new Enemy(this, 590, 100, "bat", null,"Zarathan");
                this.add.existing(bat);
                var skeleton = new Enemy(this, 390, 100, "skeleton", null, "Necro");
                this.add.existing(skeleton);
                this.enemies = [ ghost, bat, skeleton ];
            }
        }
        
        // array with heroes
        this.heroes = [ geraldo];
        // array with enemies
       
        // array with both parties, who will attack
        this.units = this.heroes.concat(this.enemies);
        
        this.index = -1; // currently active unit
        
        this.scene.launch("UIScene");        
    },
    nextTurn: function() {  
        // if we have victory or game over
        if(this.checkEndBattle()) {           
            this.endBattle();
            return;
        }
        do {
            // currently active unit
            this.index++;
            // if there are no more units, we start again from the first one
            if(this.index >= this.units.length) {
                this.index = 0;
            }            
        } while(!this.units[this.index].living);
        // if its player hero
        if(this.units[this.index] instanceof PlayerCharacter) {
            // we need the player to select action and then enemy
            this.events.emit("PlayerSelect", this.index);
        } else { // else if its enemy unit
            // pick random living hero to be attacked
            var r;
            do {
                r = Math.floor(Math.random() * this.heroes.length);
            } while(!this.heroes[r].living) 
            // call the enemy's attack function 
            this.units[this.index].attack(this.heroes[r]);  
            // add timer for the next turn, so will have smooth gameplay
            this.time.addEvent({ delay: 3000, callback: this.nextTurn, callbackScope: this });
        }
    },     
    // check for game over or victory
    checkEndBattle: function() {    
        debugger    
        var victory = true;
        // if all enemies are dead we have victory
        for(var i = 0; i < this.enemies.length; i++) {
            if(this.enemies[i].living)
                victory = false;
        }
        var gameOver = true;
        // if all heroes are dead we have game over
        for(var i = 0; i < this.heroes.length; i++) {
            if(this.heroes[i].living)
                gameOver = false;
                endGame = gameOver;
        }
        return victory || gameOver;
    },
    // when the player have selected the enemy to be attacked
    receivePlayerSelection: function(action, target) {
        if(action == "attack") {            
            this.units[this.index].attack(this.enemies[target]);   
            console.log (this.index+this.enemies[target]);           
        }else if (action == "magic"){
        this.units[this.index].magic(this.enemies[target]);   
            console.log (this.index+this.enemies[target]); 
        }
        // next turn in 3 seconds
        this.time.addEvent({ delay: 3000, callback: this.nextTurn, callbackScope: this });        
    },    
    
    endBattle: function() {       
        // clear state, remove sprites
        this.heroes.length = 0;
        this.enemies.length = 0;
        for(var i = 0; i < this.units.length; i++) {
            // link item
            this.units[i].destroy();            
        }
        this.units.length = 0;

        if (endGame==false){
            //atualiza experiencia do personagem
            experience += this.enemies.length*expEnemy;
            if(experience>=20){
                this.scene.events.emit("Message", "Level UP! Aperte I e acompanhe seus status");
            }
            // sleep the UI
            this.scene.sleep('UIScene');
            // return to WorldScene and sleep current BattleScene
            this.scene.switch('CaveScene');
        }else{
            this.scene.events.emit("Message", "Geraldo foi derrotado!");
            this.scene.sleep("UIScene");
            this.scene.start("MainMenu");
       
        }
    }
});

// base class for heroes and enemies
var Unit = new Phaser.Class({
    Extends: Phaser.GameObjects.Sprite,

    initialize:

    function Unit(scene, x, y, texture, frame, type) {
        Phaser.GameObjects.Sprite.call(this, scene, x, y, texture, frame)
        this.type = type;
        level;
        hp;
        mana;
        def;
        atk;
        this.living = true;         
        this.menuItem = null;
        if (boss==true){
            hpEnemy = 100;
            defEnemy = 10;
            atkEnemy = 15;
            expEnemy = 200;
        }else{
            //Atributos inimigos
            if(level <= 5){
                hpEnemy = hpEnemy;
                defEnemy = defEnemy;
                atkEnemy = atkEnemy;
                expEnemy = 20;
            }else if(level > 5 && level <= 10){
                hpEnemy = hpEnemy*2;
                defEnemy = defEnemy*2;
                atkEnemy = atkEnemy*2;
                expEnemy = 17;
            }else if (level > 10 && level <= 15 ){
                hpEnemy = hpEnemy*3;
                defEnemy = defEnemy*3;
                atkEnemy = atkEnemy*3;
                expEnemy = 15;
            }else if (level > 15 && level <= 20 ){
                hpEnemy = hpEnemy*4;
                defEnemy = defEnemy*4;
                atkEnemy = atkEnemy*4;
                expEnemy = 13;
            }else if (level > 20 && level <= 25 ){
                    hpEnemy = hpEnemy*5;
                    defEnemy = defEnemy*5;
                    atkEnemy = atkEnemy*5;
                    expEnemy = 11;
            }else if (level > 25){
                hpEnemy = hpEnemy*6;
                defEnemy = defEnemy*6;
                atkEnemy = atkEnemy*6;
                expEnemy = 9;
            }
        }
    },
    // we will use this to notify the menu item when the unit is dead
    setMenuItem: function(item) {
        this.menuItem = item;
    },
    // attack the target unit
    attack: function (target) {
        // console.log(this.type);
        if (this.type == "Geraldo") {
            if (target.living) {
                target.takeDamage(atk);
                this.scene.events.emit("Message", "Geraldo atacou " + target.type + " e causou " + atk + " de dano");

            }
        } else {
            // console.log(this.type);
            if (target.living) {
                target.takeDamage(atkEnemy);
                this.scene.events.emit("Message", this.type + " atacou " + target.type + " e causou " + atkEnemy + " de dano");

            }
        }
    },
    
    magic: function(target) {
        if(target.living) {
            target.takeMagicDamage(ignite);
            this.scene.events.emit("Message", this.type + " atacou " + target.type + " com magia e causou " + ignite + " de dano!");
        }
    },   

    takeMagicDamage: function () {
        // console.log(this.type);
        console.log(this.type);
        hpEnemy -= ignite;
        console.log("Vida Inimigo depois igni: " + hpEnemy)
        if (hpEnemy <= 0) {
            hpEnemy = 0;
            this.menuItem.unitKilled();
            this.living = false;
            this.visible = false;
            this.menuItem = null;
        }
    },
    takeDamage: function () {
        // console.log(this.type);
        if (this.type == "Geraldo") {
            console.log("Vida Geraldo: " + hp)
            hp -= atkEnemy + def;
            console.log("Vida Geraldo: " + hp)

            if (hp <= 0) {
                hp = 0;
                this.menuItem.unitKilled();
                this.living = false;
                this.visible = false;
                this.menuItem = null;
            }
        } else {
            console.log(this.type);
            hpEnemy -= atk + defEnemy;
            console.log("Vida Inimigo: " + hpEnemy)
            if (hpEnemy <= 0) {
                hpEnemy = 0;
                this.menuItem.unitKilled();
                this.living = false;
                this.visible = false;
                this.menuItem = null;
            }
        }
    }
});

var Enemy = new Phaser.Class({
    Extends: Unit,

    initialize:
    function Enemy(scene, x, y, texture, frame, type) {
        Unit.call(this, scene, x, y, texture, frame, type, hpEnemy, atkEnemy, defEnemy);
    }
});

var PlayerCharacter = new Phaser.Class({
    Extends: Unit,

    initialize:
    function PlayerCharacter(scene, x, y, texture, frame, type) {
        Unit.call(this, scene, x, y, texture, frame, type, hp, mana, atk, def, level);
        // flip the image so I don"t have to edit it manually
        
    }
});

var MenuItem = new Phaser.Class({
    Extends: Phaser.GameObjects.Text,
    
    initialize:
            
    function MenuItem(x, y, text, scene) {
        Phaser.GameObjects.Text.call(this, scene, x, y, text, { color: "#ffffff", align: "left", fontSize: 15});
    },
    
    select: function() {
        this.setColor("#f8ff38");
    },
    
    deselect: function() {
        this.setColor("#ffffff");
    },
    // when the associated enemy or player unit is killed
    unitKilled: function() {
        this.active = false;
        this.visible = false;
    }
    
});

// base menu class, container for menu items
var Menu = new Phaser.Class({
    Extends: Phaser.GameObjects.Container,
    
    initialize:
            
    function Menu(x, y, scene, heroes) {
        Phaser.GameObjects.Container.call(this, scene, x, y);
        this.menuItems = [];
        this.menuItemIndex = 0;
        this.x = x;
        this.y = y;        
        this.selected = false;
    },     
    addMenuItem: function(unit) {
        var menuItem = new MenuItem(0, this.menuItems.length * 20, unit, this.scene);
        this.menuItems.push(menuItem);
        this.add(menuItem); 
        return menuItem;
    },  
    // menu navigation 
    moveSelectionUp: function() {
        this.menuItems[this.menuItemIndex].deselect();
        do {
            this.menuItemIndex--;
            if(this.menuItemIndex < 0)
                this.menuItemIndex = this.menuItems.length - 1;
        } while(!this.menuItems[this.menuItemIndex].active);
        this.menuItems[this.menuItemIndex].select();
    },
    moveSelectionDown: function() {
        this.menuItems[this.menuItemIndex].deselect();
        do {
            this.menuItemIndex++;
            if(this.menuItemIndex >= this.menuItems.length)
                this.menuItemIndex = 0;
        } while(!this.menuItems[this.menuItemIndex].active);
        this.menuItems[this.menuItemIndex].select();
    },
    // select the menu as a whole and highlight the choosen element
    select: function(index) {
        if(!index)
            index = 0;       
        this.menuItems[this.menuItemIndex].deselect();
        this.menuItemIndex = index;
        while(!this.menuItems[this.menuItemIndex].active) {
            this.menuItemIndex++;
            if(this.menuItemIndex >= this.menuItems.length)
                this.menuItemIndex = 0;
            if(this.menuItemIndex == index)
                return;
        }        
        this.menuItems[this.menuItemIndex].select();
        this.selected = true;
    },
    // deselect this menu
    deselect: function() {        
        this.menuItems[this.menuItemIndex].deselect();
        this.menuItemIndex = 0;
        this.selected = false;
    },
    confirm: function() {
        // when the player confirms his slection, do the action
    },
    // clear menu and remove all menu items
    clear: function() {
        for(var i = 0; i < this.menuItems.length; i++) {
            this.menuItems[i].destroy();
        }
        this.menuItems.length = 0;
        this.menuItemIndex = 0;
    },
    // recreate the menu items
    remap: function(units) {
        this.clear();        
        for(var i = 0; i < units.length; i++) {
            var unit = units[i];
            unit.setMenuItem(this.addMenuItem(unit.type));            
        }
        this.menuItemIndex = 0;
    }
});

var HeroesMenu = new Phaser.Class({
    Extends: Menu,
    
    initialize:
            
    function HeroesMenu(x, y, scene) {
        Menu.call(this, x, y, scene);                    
    }
});

var ActionsMenu = new Phaser.Class({
    Extends: Menu,
    
    initialize:
            
    function ActionsMenu(x, y, scene) {
        Menu.call(this, x, y, scene);
        
        
        this.addMenuItem("Ataque"),
        this.addMenuItem("Magia")
        
        
    },
    confirm: function() { 
        // we select an action and go to the next menu and choose from the enemies to apply the action
        this.scene.events.emit("SelectedAction", this.menuItemIndex); 
        options = this.menuItemIndex;
        console.log(this.menuItemIndex)       
    }
    
});

var EnemiesMenu = new Phaser.Class({
    Extends: Menu,
    
    initialize:
            
    function EnemiesMenu(x, y, scene) {
        Menu.call(this, x, y, scene);        
    },       
    confirm: function() {      
        // the player has selected the enemy and we send its id with the event
        this.scene.events.emit("Enemy", this.menuItemIndex);
    }
});

// User Interface scene
var UIScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function UIScene ()
    {
        Phaser.Scene.call(this, { key: "UIScene" });
    },

    create: function ()
    {    
       // draw some background for the menu
        // x, y (Preenchimento e linhas brancas) x, y (quantidade de preenchimento)
        this.graphics = this.add.graphics();
        this.graphics.lineStyle(1, 0xffffff);
        this.graphics.fillStyle(0x031f4c, 1);
        //Menu Geraldo
        this.graphics.strokeRect(253, 280, 90, 100);
        this.graphics.fillRect(253, 280, 90, 100);
        //Inimigos
        this.graphics.strokeRect(346, 280, 90, 100);
        this.graphics.fillRect(346, 280, 90, 100);
        //Status do Geraldo
        this.graphics.strokeRect(439, 280, 240, 100);
        this.graphics.fillRect(439, 280, 240, 100);
        //Menu de Magia
        // this.graphics.strokeRect(67, 280, 90, 100);
        // this.graphics.fillRect(67, 280, 90, 100);
        //Menu de Item
        // this.graphics.strokeRect(160, 280, 90, 100);
        // this.graphics.fillRect(160, 280, 90, 100);
        
        // basic container to hold all menus
        this.menus = this.add.container();
                
        //Status do Geraldo
        this.heroesMenu = new HeroesMenu(446, 286, this);
        //Menu do Geraldo    
        this.actionsMenu = new ActionsMenu(260, 286, this);
        //Inimigos            
        this.enemiesMenu = new EnemiesMenu(353, 286, this);
        //Menu de Item
        //this.itemMenu = new ItemMenu(74, 286, this);
        //Menu de Magia
        //this.magicMenu = new MagicMenu(167, 286, this);


        // the currently selected menu 
        this.currentMenu = this.actionsMenu;
        
        // add menus to the container
        this.menus.add(this.heroesMenu);
        this.menus.add(this.actionsMenu);
        this.menus.add(this.enemiesMenu);
                
        this.battleScene = this.scene.get("BattleScene");                                
        
        // listen for keyboard events
        this.input.keyboard.on("keydown", this.onKeyInput, this);   
        
        // when its player cunit turn to move
        this.battleScene.events.on("PlayerSelect", this.onPlayerSelect, this);
        
        // when the action on the menu is selected
        // for now we have only one action so we dont send and action id
        this.events.on("SelectedAction", this.onSelectedAction, this);
        
        // an enemy is selected
        this.events.on("Enemy", this.onEnemy, this);
        
        // when the scene receives wake event
        this.sys.events.on('wake', this.createMenu, this);
        
        // the message describing the current action
        this.message = new Message(this, this.battleScene.events);
        this.add.existing(this.message);        
        
        this.createMenu();     
    },
    createMenu: function() {
        // map hero menu items to heroes
        this.remapHeroes();
        // map enemies menu items to enemies
        this.remapEnemies();
        // first move
        this.battleScene.nextTurn(); 
    },
    onEnemy: function(index) {
        // when the enemy is selected, we deselect all menus and send event with the enemy id
       
debugger;
console.log("index: "+index)
        if(options == 0 ){
            this.battleScene.receivePlayerSelection("attack", index);
        }else{
            this.battleScene.receivePlayerSelection("magic", index);
        }  
        this.heroesMenu.deselect();
        this.actionsMenu.deselect();
        this.enemiesMenu.deselect();
        this.currentMenu = null;
    },
    onPlayerSelect: function(id) {
        // when its player turn, we select the active hero item and the first action
        // then we make actions menu active
        this.heroesMenu.select(id);
        this.actionsMenu.select(0);
        this.currentMenu = this.actionsMenu;
    },
    // we have action selected and we make the enemies menu active
    // the player needs to choose an enemy to attack
    onSelectedAction: function() {
        this.currentMenu = this.enemiesMenu;
        this.enemiesMenu.select(0);
    },
    remapHeroes: function() {
        var heroes = this.battleScene.heroes;
        this.heroesMenu.remap(heroes);
    },
    remapEnemies: function() {
        var enemies = this.battleScene.enemies;
        this.enemiesMenu.remap(enemies);
    },
    onKeyInput: function(event) {
        if(this.currentMenu && this.currentMenu.selected) {
            if(event.code === "ArrowUp") {
                this.currentMenu.moveSelectionUp();
            } else if(event.code === "ArrowDown") {
                this.currentMenu.moveSelectionDown();
            } else if(event.code === "ArrowRight" || event.code === "Shift") {

            } else if(event.code === "Space" || event.code === "ArrowLeft") {
                this.currentMenu.confirm();
            } 
        }
    },
});

// the message class extends containter 
var Message = new Phaser.Class({

    Extends: Phaser.GameObjects.Container,

    initialize:
    function Message(scene, events) {
        Phaser.GameObjects.Container.call(this, scene, 384, 30);
        var graphics = this.scene.add.graphics();
        this.add(graphics);
        graphics.lineStyle(1, 0xffffff, 1);
        graphics.fillStyle(0x031f4c, 1);        
        graphics.strokeRect(-202, -15, 404, 45);
        graphics.fillRect(-202, -15, 404, 45);
        this.text = new Phaser.GameObjects.Text(scene, 0, 0, "", { color: "#ffffff", align: "center", fontSize: 13, wordWrap: { width: 394, useAdvancedWrap: true }});
        this.add(this.text);
        this.text.setOrigin(0.5);        
        events.on("Message", this.showMessage, this);
        this.visible = false;
    },
    showMessage: function(text) {
        this.text.setText(text);
        this.visible = true;
        if(this.hideEvent)
            this.hideEvent.remove(false);
        this.hideEvent = this.scene.time.addEvent({ delay: 3000, callback: this.hideMessage, callbackScope: this });
    },
    hideMessage: function() {
        this.hideEvent = null;
        this.visible = false;
    }
});