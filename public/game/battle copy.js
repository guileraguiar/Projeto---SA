var BattleScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

        function BattleScene() {
            Phaser.Scene.call(this, { key: "BattleScene" });
        },

    create: function () {
        // change the background to green
        this.cameras.main.setBackgroundColor("rgba(0, 200, 0, 0.5)");
        this.startBattle();
        // on wake event we call startBattle too
        this.sys.events.on('wake', this.startBattle, this);
    },
    startBattle: function () {

        // player character - geraldo
        var geraldo = new PlayerCharacter(this, 50, 75, "player", 0, "Geraldo", 100, 20);
        geraldo.visible = false;
        this.add.existing("teste");

        var dragonblue = new Enemy(this, 250, 50, "dragonblue", null, "Dragon", 50, 3);
        this.add.existing(dragonblue);

        var dragonOrange = new Enemy(this, 250, 100, "dragonorrange", null, "Dragon2", 50, 3);
        this.add.existing(dragonOrange);

        // array with heroes
        this.heroes = [geraldo];
        // array with enemies
        this.enemies = [dragonblue, dragonOrange];
        // array with both parties, who will attack
        this.units = this.heroes.concat(this.enemies);

        this.index = -1; // currently active unit

        this.scene.launch("UIScene");
    },

    nextTurn: function () {
        // if we have victory or game over
        if (this.checkEndBattle()) {
            this.endBattle();
            return;
        }
        do {
            // currently active unit
            this.index++;
            // if there are no more units, we start again from the first one
            if (this.index >= this.units.length) {
                this.index = 0;
            }
        } while (!this.units[this.index].living);
        // if its player hero
        if (this.units[this.index] instanceof PlayerCharacter) {
            // we need the player to select action and then enemy
            this.events.emit("PlayerSelect", this.index);
        } else { // else if its enemy unit
            // pick random living hero to be attacked
            var r;
            do {
                r = Math.floor(Math.random() * this.heroes.length);
            } while (!this.heroes[r].living)
            // call the enemy's attack function 
            this.units[this.index].attack(this.heroes[r]);
            // add timer for the next turn, so will have smooth gameplay
            this.time.addEvent({ delay: 3000, callback: this.nextTurn, callbackScope: this });
        }
    },
    // check for game over or victory
    checkEndBattle: function () {
        var victory = true;
        // if all enemies are dead we have victory
        for (var i = 0; i < this.enemies.length; i++) {
            if (this.enemies[i].living)
                victory = false;
        }
        var gameOver = true;
        // if all heroes are dead we have game over
        for (var i = 0; i < this.heroes.length; i++) {
            if (this.heroes[i].living)
                gameOver = false;
        }
        return victory || gameOver;
    },
    // when the player have selected the enemy to be attacked
    receivePlayerSelection: function (action, target) {
        switch (action) {
            case "attack":
                this.units[this.index].attack(this.enemies[target]);
                break;
            case "magic":
                this.units[this.index].magic(this.enemies[target]);
                break;
            case "itens":
                this.units[this.index].item(this.enemies[target]);
                break;
            case "run":
                this.units[this.index].run(this.enemies[target]);
                break;
            default:
                break;
        }
        // next turn in 3 seconds
        this.time.addEvent({ delay: 3000, callback: this.nextTurn, callbackScope: this });
    },
    endBattle: function () {

        // $.ajax({
        //     url : "atualizar.php",
        //     type : 'post',
        //     data : {
        //         xp: variavel,
        //         xp2: variavel2
        //         }
        //     })
        //     .done(function(msg){

        //     })
        //     .fail(function(jqXHR, textStatus, msg){
        //         alert(msg);
        //     }); 




        // clear state, remove sprites
        this.heroes.length = 0;
        this.enemies.length = 0;
        for (var i = 0; i < this.units.length; i++) {
            // link item
            this.units[i].destroy();
        }
        this.units.length = 0;
        // sleep the UI
        this.scene.sleep('UIScene');
        // return to WorldScene and sleep current BattleScene
        this.scene.switch('CaveScene');
    }
});

// base class for heroes and enemies

var Unit = new Phaser.Class({

    Extends: Phaser.GameObjects.Sprite,

    initialize:


        function Unit(scene, x, y, texture, frame, type, typeMagic) {
            Phaser.GameObjects.Sprite.call(this, scene, x, y, texture, frame, type, typeMagic)
            typeMagic = magicDescription;
            this.type = type;
            this.typeMagic = typeMagic;
            hp;
            atk; // default damage
            def;
            mana;
            itens;
            this.living = true;
            this.menuItem = null;
            // debugger;
            hpEnemy;
            defEnemy;
            atkEnemy;

            hpSpider;
            defSpider;
            atkSpider;
            // console.log(hpEnemy)
            // debugger;
        },

    // we will use this to notify the menu item when the unit is dead
    setMenuItem: function (item) {
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
    magic: function (target) {
        this.typeMagic[0];
        console.log(mana);
        console.log(this.typeMagic);
        // console.log(this.type);
        if (this.typeMagic[0] == "Incendiar" && mana >= 20) {

            if (target.living) {
                target.takeDamage(ignite);
                this.scene.events.emit("Message", "Geraldo atacou " + target.type + " com " + this.typeMagic + " e causou " + ignite + " de dano");

            }
        } else if (this.typeMagic[1] == "Barreira" && mana >= 30) {
            // console.log(this.type);
            this.scene.events.emit("Message", "O próximo ataque inimigo sera bloqueado!");

        } else if (this.typeMagic[2] == "Prisão" && mana >= 50) {
            this.scene.events.emit("Message", "O inimigo não poderá te atacar por 2 turnos!");
        }
    },

    item: function (target) {
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
   
    takeDamage: function () {
        // console.log(this.type);
        if (this.type == "Geraldo") {

            hp =- atkEnemy;
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
            hpEnemy -= atk;
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
            Unit.call(this, scene, x, y, texture, frame, type);
        }
});

var PlayerCharacter = new Phaser.Class({
    Extends: Unit,

    initialize:
        function PlayerCharacter(scene, x, y, texture, frame, type, typeMagic) {
            Unit.call(this, scene, x, y, texture, frame, type, typeMagic);
            // flip the image so I don"t have to edit it manually
            // this.flipX = true;

            // this.setScale(2);
        }
});

var MenuItem = new Phaser.Class({
    Extends: Phaser.GameObjects.Text,

    initialize:

        function MenuItem(x, y, text, scene) {
            Phaser.GameObjects.Text.call(this, scene, x, y, text, { color: "#ffffff", align: "left", fontSize: 12 });
        },

    select: function () {
        this.setColor("#f8ff38");
    },

    deselect: function () {
        this.setColor("#ffffff");
    },
    // when the associated enemy or player unit is killed
    unitKilled: function () {
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

    addMenuItem: function (unit) {
        var menuItem = new MenuItem(0, this.menuItems.length * 15, unit, this.scene);
        this.menuItems.push(menuItem);
        this.add(menuItem);
        // console.log (menuItem);
        console.log(this.menuItems.length);

        return menuItem;
    },
    // menu navigation 
    moveSelectionUp: function () {
        this.menuItems[this.menuItemIndex].deselect();
        do {
            this.menuItemIndex--;
            if (this.menuItemIndex < 1)
                this.menuItemIndex = this.menuItems.length - 1;
        } while (!this.menuItems[this.menuItemIndex].active);
        this.menuItems[this.menuItemIndex].select();
    },
    moveSelectionDown: function () {
        this.menuItems[this.menuItemIndex].deselect();
        do {
            this.menuItemIndex++;
            if (this.menuItemIndex >= this.menuItems.length)
                this.menuItemIndex = 1;
        } while (!this.menuItems[this.menuItemIndex].active);
        this.menuItems[this.menuItemIndex].select();
    },
    // select the menu as a whole and highlight the choosen element
    select: function (index) {
        if (!index)
            index = 0;
        this.menuItems[this.menuItemIndex].deselect();
        this.menuItemIndex = index;
        while (!this.menuItems[this.menuItemIndex].active) {
            this.menuItemIndex++;
            if (this.menuItemIndex >= this.menuItems.length)
                this.menuItemIndex = 0;
            if (this.menuItemIndex == index)
                return;
        }
        this.menuItems[this.menuItemIndex].select();
        this.selected = true;
    },
    // deselect this menu
    deselect: function () {
        this.menuItems[this.menuItemIndex].deselect();
        this.menuItemIndex = 0;
        this.selected = false;
    },
    confirm: function () {
        // when the player confirms his slection, do the action
    },
    // clear menu and remove all menu items
    clear: function () {
        for (var i = 0; i < this.menuItems.length; i++) {
            this.menuItems[i].destroy();
        }
        this.menuItems.length = 0;
        this.menuItemIndex = 0;
    },
    // recreate the menu items
    remap: function (units) {
        this.clear();
        for (var i = 0; i < units.length; i++) {
            var unit = units[i];
            unit.setMenuItem(this.addMenuItem(unit.type));
        }
        this.menuItemIndex = 0;
    }
});

var HeroMenu = new Phaser.Class({
    Extends: Menu,

    initialize:

        function HeroMenu(x, y, scene) {
            Menu.call(this, x, y, scene);
            this.addMenuItem("Vida: " + hp);
            this.addMenuItem("Mana: " + mana);
        }
});

var ActionsMenu = new Phaser.Class({
    Extends: Menu,

    initialize:

        function ActionsMenu(x, y, scene) {
            Menu.call(this, x, y, scene);
            this.addMenuItem("--AÇÕES--");
            this.addMenuItem("Ataque");
            this.addMenuItem("Magia");
            this.addMenuItem("Itens");
          

        },
    confirm: function () {
        // we select an action and go to the next menu and choose from the enemies to apply the action
        this.scene.events.emit("SelectedAction", this.menuItemIndex) ;
    }

});
var MagicMenu = new Phaser.Class({
    Extends: Menu,

    initialize:

        function MagicMenu(x, y, scene) {
            Menu.call(this, x, y, scene);
            this.addMenuItem("--MAGIAS--");
            this.addMenuItem("Incendiar");
            this.addMenuItem("Barreira");
            this.addMenuItem("Prisão");
        },
    confirm: function () {
        // we select an action and go to the next menu and choose from the enemies to apply the action
        this.scene.events.emit("SelectedAction", this.menuItemIndex);
    }

});

var ItemMenu = new Phaser.Class({
    Extends: Menu,

    initialize:

        function ItemMenu(x, y, scene) {
            Menu.call(this, x, y, scene);
            this.addMenuItem("--ITENS--");
            this.addMenuItem("Éter 50ml");
            this.addMenuItem("Revigorante");
            this.addMenuItem("Adrenalina");
        },
    confirm: function () {
        // we select an action and go to the next menu and choose from the enemies to apply the action
        this.scene.events.emit("SelectedAction", this.menuItemIndex);
    }

});

var EnemiesMenu = new Phaser.Class({
    Extends: Menu,

    initialize:

        function EnemiesMenu(x, y, scene) {
            Menu.call(this, x, y, scene);
        },
    confirm: function () {
        // the player has selected the enemy and we send its id with the event
        this.scene.events.emit("Enemy", this.menuItemIndex);
        console.log(this.menuItemIndex)
    }
});

// User Interface scene
var UIScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

        function UIScene() {
            Phaser.Scene.call(this, { key: "UIScene" });
        },

    create: function () {
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
        this.graphics.strokeRect(67, 280, 90, 100);
        this.graphics.fillRect(67, 280, 90, 100);
        //Menu de Item
        this.graphics.strokeRect(160, 280, 90, 100);
        this.graphics.fillRect(160, 280, 90, 100);

        // basic container to hold all menus
        this.menus = this.add.container();

        //Status do Geraldo
        this.heroMenu = new HeroMenu(446, 286, this);
        //Menu do Geraldo    
        this.actionsMenu = new ActionsMenu(260, 286, this);
        //Inimigos            
        this.enemiesMenu = new EnemiesMenu(353, 286, this);
        //Menu de Item
        this.itemMenu = new ItemMenu(74, 286, this);
        //Menu de Magia
        this.magicMenu = new MagicMenu(167, 286, this);

        // the currently selected menu 
        this.currentMenu = this.actionsMenu;

        // add menus to the container
        this.menus.add(this.enemiesMenu);
        this.menus.add(this.actionsMenu);
        this.menus.add(this.heroMenu);
        this.menus.add(this.itemMenu);
        this.menus.add(this.magicMenu);

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
    createMenu: function () {
        // map hero menu items to heroes
        this.remapHeroes();
        // map enemies menu items to enemies
        this.remapEnemies();
        // first move
        this.battleScene.nextTurn();
    },
    onEnemy: function (index) {
        // when the enemy is selected, we deselect all menus and send event with the enemy id
        this.heroMenu.deselect();
        this.actionsMenu.deselect();
        this.enemiesMenu.deselect();
        this.currentMenu = null;
        debugger;
        console.log(index);
        switch (index) {
            case 0:
        this.battleScene.receivePlayerSelection("attack", index);
            break;
            case 1:
                this.battleScene.receivePlayerSelection("magic", index);
            break;
            case 2:
                this.battleScene.receivePlayerSelection("item", index);
            break;
            case 3:
                this.battleScene.receivePlayerSelection("run", index);  
            break;
            default:
                break;
        }




    },
    onPlayerSelect: function (id) {
        // when its player turn, we select the active hero item and the first action
        // then we make actions menu active
        this.heroMenu.select(id);
        console.log("IDE: "+id);
        this.actionsMenu.select(0);
        this.currentMenu = this.actionsMenu;
    },
    // we have action selected and we make the enemies menu active
    // the player needs to choose an enemy to attack

    onSelectedAction: function () {
        console.log()
        debugger;
        // switch (this.menuItemIndex) {
        //     case 1:
        this.currentMenu = this.enemiesMenu;
        this.enemiesMenu.select(0);
        //     break;
        //     case 2:
        //         this.currentMenu = this.magicMenu;
        //         this.magicMenu.select(0);
        //     break;
        //     case 3:
        //         this.currentMenu = this.itemMenu;
        //         this.itemMenu.select(0);
        //     break;
        //     default:
        //     break;
        // }


    },
    remapHeroes: function () {
        this.heroMenu;
    },
    remapEnemies: function () {
        var enemies = this.battleScene.enemies;
        this.enemiesMenu.remap(enemies);
    },
    onKeyInput: function (event) {
        if (this.currentMenu && this.currentMenu.selected) {
            if (event.code === "ArrowUp") {
                this.currentMenu.moveSelectionUp();
            } else if (event.code === "ArrowDown") {
                this.currentMenu.moveSelectionDown();
            } else if (event.code === "ArrowRight" || event.code === "Shift") {

            } else if (event.code === "Space") {
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
            graphics.lineStyle(1, 0xffffff, 0.8);
            graphics.fillStyle(0x031f4c, 0.3);
            graphics.strokeRect(-125, -15, 250, 35);
            graphics.fillRect(-125, -15, 250, 35);
            this.text = new Phaser.GameObjects.Text(scene, 0, 0, "", { color: "#ffffff", align: "center", fontSize: 13, wordWrap: { width: 246, useAdvancedWrap: true } });
            this.add(this.text);
            this.text.setOrigin(0.5);
            events.on("Message", this.showMessage, this);
            this.visible = false;
        },
    showMessage: function (text) {
        this.text.setText(text);
        this.visible = true;
        if (this.hideEvent)
            this.hideEvent.remove(false);
        this.hideEvent = this.scene.time.addEvent({ delay: 3000, callback: this.hideMessage, callbackScope: this });
    },
    hideMessage: function () {
        this.hideEvent = null;
        this.visible = false;
    }
});